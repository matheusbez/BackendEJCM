<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dealership;
use App\Car;

class OneToManyController extends Controller
{
    public function oneToMany()
    {
    $dealership = Dealership::where('name', 'Maserati')->get()->first();
    	return ($dealership->name);
    }
}
