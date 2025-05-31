<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product_Controller;

route::resource('/product',Product_Controller::class);

//Route::get('/', function () {
   // return view('view');
//});
