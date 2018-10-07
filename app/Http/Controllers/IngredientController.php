<?php

namespace App\Http\Controllers;

use App\Http\Resources\IngredientResource;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IngredientController extends Controller
{
	public function index() {
		return IngredientResource::collection(Ingredient::all());
	}


	public function create() {
		return abort(Response::HTTP_METHOD_NOT_ALLOWED);
	}


	public function store(Request $request) {
		if ($request->has('name')) {
			$ingredient = Ingredient::firstOrCreate($request->except([ 'icons' ]));

			if ($request->has('icons')) {
				$ingredient->icons()->sync($request->input('icons'));
			} else {
				$ingredient->icons()->detach();
			}

			return new IngredientResource($ingredient);
		}

		return abort(Response::HTTP_BAD_REQUEST);
	}


	public function show($id) {
		$cup = Ingredient::find($id);

		if ($cup && $cup->exists) {
			return new IngredientResource($cup);
		}

		return abort(Response::HTTP_NOT_FOUND);
	}


	public function edit($id) {
		return abort(Response::HTTP_METHOD_NOT_ALLOWED);
	}


	public function update(Request $request, $id) {
		$ingredient = Ingredient::find($id);

		if ($ingredient && $ingredient->exists) {
			$ingredient->update($request->except([ 'icons' ]));

			if ($request->has('icons')) {
				$ingredient->icons()->sync($request->input('icons'));
			} else {
				$ingredient->icons()->detach();
			}

			return new IngredientResource($ingredient);
		}

		return abort(Response::HTTP_NOT_FOUND);
	}


	public function destroy($id) {
		$ingredient = Ingredient::find($id);

		if ($ingredient && $ingredient->exists) {
			$ingredient->delete();

			return NULL;
		}

		return abort(Response::HTTP_NOT_FOUND);
	}
}
