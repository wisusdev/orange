<?php

use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ProviderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {
	Route::apiResource('providers', ProviderController::class);
	Route::apiResource('products', ProductController::class);
});