<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dealership;

class DealershipController extends Controller
{
    
    public function createDealership(Request $request){

    	$concessionaria = new Dealership;

    	$concessionaria->name = $request->name;
    	$concessionaria->founder_name = $request->founder_name;
    	$concessionaria->adress = $request->adress;
    	$concessionaria->phone = $request->phone;
    	$concessionaria->cnpj = $request->cnpj;
    	$concessionaria->save();

    	return response()->success($concessionaria);
    }
    public function listDealership(Request $request){

    	return Dealership::all();
    }
    public function showDealership(Request $id){

    	$concessionaria = Dealership::find($id);

    	if ($concessionaria){
    		return response()->success($concessionaria);
    	} else{
    		$data = "Concessionária não encontrada, verifique o id novamente";
    		return response()->error($data, 400);
    	}
    }
    public function updateDealership(Request $request, $id){

    	$concessionaria = Dealership::findOrFail($id);

    	if ($request->name)
    		$concessionaria->name = $request->name;
    	if($request->founder_name)
    		$concessionaria->founder_name = $request->founder_name;
    	if($request->adress)
    		$concessionaria->adress = $request->adress;
    	if ($request->phone)
    		$concessionaria->phone = $request->phone;
    	if($request->cnpj)
    		$concessionaria->cnpj = $request->cnpj;
    	$concessionaria->save();

    	return response()->success($concessionaria);
    }
    public function deleteDealership($id){

    	Dealership::destroy($id);
    	return response()->json(['Concessionária deletada']);
	}
}