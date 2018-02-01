<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
class RecipeController extends Controller
{
    //
    public function index(){
    	if(Auth::check()){
    		return view('recipes.index');
    	}
    }
}
