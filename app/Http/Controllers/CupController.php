<?php

namespace App\Http\Controllers;

use App\Http\Resources\CupResource;
use App\Models\Cup;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CupController extends Controller
{
	public function index() {
		return CupResource::collection(Cup::all());
	}


	public function create() {
		return abort(Response::HTTP_METHOD_NOT_ALLOWED);
	}


	public function store(Request $request) {
		$data = $request->all();

		if ($data && count($data) >= 2) {
			$cup = Cup::firstOrCreate($data);

			return new CupResource($cup);
		}

		return abort(Response::HTTP_BAD_REQUEST);
	}


	public function show($id) {
		$cup = Cup::find($id);

		if ($cup && $cup->exists) {
			return new CupResource($cup);
		}

		return abort(Response::HTTP_NOT_FOUND);
	}


	public function edit($id) {
		return abort(Response::HTTP_METHOD_NOT_ALLOWED);
	}


	public function update(Request $request, $id) {
		$cup = Cup::find($id);

		if ($cup && $cup->exists) {
			$data = $request->all();

			if ($data && count($data) >= 2) {
				$cup->update($data);

				return new CupResource($cup);
			}

			return abort(Response::HTTP_BAD_REQUEST);
		}

		return abort(Response::HTTP_NOT_FOUND);
	}


	public function destroy($id) {
		$cup = Cup::find($id);

		if ($cup && $cup->exists) {
			$cup->delete();
		}

		return abort(Response::HTTP_NOT_FOUND);
	}
}
