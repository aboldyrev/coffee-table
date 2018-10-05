<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class ReplaceStatusResponse
{
	protected $isDebug = false;

	protected $statusCode;

	protected $statuses = [
		200 => 'OK',
		201 => 'Created',
		304 => 'Not Modified',
		400 => 'Bad Request',
		401 => 'Unauthorized',
		403 => 'Forbidden',
		404 => 'Not Found',
		424 => 'Failed Dependency',
		500 => 'Internal server error',
	];


	public function __construct() {
		$this->isDebug = env('APP_DEBUG') && env('APP_ENV') !== 'production';
	}


	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure                 $next
	 *
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		/** @var Response $response */
		$response = $next($request);

		$this->statusCode = $response->status();

		$response->header('content-type', 'application/json');
		$response->setStatusCode(200, "OK");

		if ($this->statusCode >= 202 && $this->statusCode < 400 && $this->statusCode != 304) {
			return $response;
		}

		if (!key_exists($this->statusCode, $this->statuses)) {
			$response->setContent([
				'code'    => $this->statusCode,
				'message' => Response::$statusTexts[ $this->statusCode ],
			]);
			return $response;
		}

		$status = $this->getResponseStatus();
		$errors = $this->getResponseErrors($response);
		$content = json_decode($response->getContent());

		if ($errors && $this->isDebug) {
			$content = $this->setContent($content, $status, $errors);
		} else {
			$content = $this->setContent($content, $status);
		}

		$content = json_encode($content, JSON_UNESCAPED_UNICODE | JSON_PARTIAL_OUTPUT_ON_ERROR);
		$response->setContent($content);

		return $response;
	}


	protected function getResponseStatus() {
		$code = $this->statusCode;

		return [
			'code'    => $code,
			'message' => $this->getMessageCode($code),
		];
	}


	/**
	 * @param Response $response
	 *
	 * @return array|null
	 */
	protected function getResponseErrors($response) {
		if (
			$this->statusCode != 200 &&
			$response->exception &&
			$this->isDebug
		) {
			$exception = $response->exception;

			return [
				'file'    => $exception->getFile(),
				'line'    => $exception->getLine(),
				'message' => $exception->getMessage(),
				'trace'   => $exception->getTrace(),
			];
		}

		return NULL;
	}


	protected function getMessageCode(int $code) {
		if (key_exists($code, $this->statuses)) {
			return $this->statuses[ $code ];
		}

		return Response::$statusTexts[ $code ];
	}


	protected function setContent($content, $status, $errors = NULL) {

		if(is_null($content)) {
			$content = is_null($errors) ? compact('status') : compact('status', 'errors');
		} elseif(is_object($content)) {
			$content->status = $status;

			if(!is_null($errors)) {
				$content->errors = $errors;
			}
		} else {

			$content[ 'status' ] = $status;

			if(!is_null($errors)) {
				$content[ 'errors' ] = $errors;
			}

		}

		return $content;
	}
}