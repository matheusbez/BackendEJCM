<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;

class CarController extends Controller
{
	public function createCar(Request $request){

    	$carro = new Car;

    	$carro->type = $request->type;
    	$carro->model = $request->model;
    	$carro->color = $request->color;
    	$carro->price = $request->price;
    	$carro->dealership_id = $request->dealership_id;
    	$carro->save();

    	return response()->success($carro);
    }
    public function listCar(Request $request){

    	return Car::all();
    }
    public function showCar(Request $id){

    	$carro = Car::find($id);

    	if ($carro) {
    		return response()->success($carro);
    	} else{
    		$data = "Carro não encontrado, verifique o id novamente";
    		return response()->error($data, 400);
    	}
    }
    public function updateCar(Request $request, $id){

    	$carro = Car::findOrFail($id);
    	if ($request->type)
    		$carro->type = $request->type;
    	if($request->model)
    		$carro->model = $request->model;
    	if($request->color)
    		$carro->color = $request->color;
    	if ($request->price)
    		$carro->price = $request->price;
    	if($request->dealership_id)
    		$carro->dealership_id = $request->dealership_id;
    	$carro->save();

    	return response()->success($carro);
    }
    public function deleteCar($id){

    	Car::destroy($id);
    	return response()->json(['Carro deletado']);
    }
}