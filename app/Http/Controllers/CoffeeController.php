<?php

namespace App\Http\Controllers;

use App\Http\Resources\CoffeeResource;
use App\Models\Coffee;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CoffeeController extends Controller
{
	public function index() {
		return CoffeeResource::collection(Coffee::all());
	}


	public function create() {
		return abort(Response::HTTP_METHOD_NOT_ALLOWED);
	}


	public function store(Request $request) {
		if (
			!$request->has('name') ||
			!$request->has('cup') ||
			!$request->has('ingredients')
		) {
			return abort(Response::HTTP_BAD_REQUEST);
		}

		$coffee = Coffee::firstOrCreate($request->except('cup', 'ingredients'));
		$coffee->ingredients()->detach();

		$coffee
			->cup()
			->associate($request->input('cup'))
			->save();

		foreach ($request->input('ingredients') as $ingredient) {
			$ingregient_id = $ingredient[ 'id' ];
			$volume = $ingredient[ 'volume' ];

			$coffee->ingredients()->attach($ingregient_id, compact('volume'));
		}

		return new CoffeeResource($coffee);
	}


	public function show($id) {
		$coffee = Coffee::find($id);

		if ($coffee && $coffee->exists) {
			return new CoffeeResource($coffee);
		}

		return abort(Response::HTTP_NOT_FOUND);
	}


	public function edit($id) {
		return abort(Response::HTTP_METHOD_NOT_ALLOWED);
	}


	public function update(Request $request, $id) {
		$coffee = Coffee::find($id);

		if (!$coffee || !$coffee->exists) {
			return abort(Response::HTTP_NOT_FOUND);
		}

		$coffee->update($request->except('cup', 'ingredients'));

		if ($request->has('cup')) {
			$coffee
				->cup()
				->associate($request->input('cup'))
				->save();
		}

		if ($request->has('ingredients')) {
			$coffee->ingredients()->detach();
			foreach ($request->input('ingredients') as $ingredient) {
				$ingregient_id = $ingredient[ 'id' ];
				$volume = $ingredient[ 'volume' ];

				$coffee->ingredients()->attach($ingregient_id, compact('volume'));
			}
		}

		return new CoffeeResource($coffee);
	}


	public function destroy($id) {
		$coffee = Coffee::find($id);

		if ($coffee && $coffee->exists) {
			$coffee->delete();

			return NULL;
		}

		return abort(Response::HTTP_NOT_FOUND);
	}
}
