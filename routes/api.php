<?php

use App\Http\Controllers\CreateCategory;
use App\Http\Controllers\CreateUser;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return response()->json([
        "message" => "Daniel Samassumba"
    ]);
});
Route::post('/category/create',[ CreateCategory::class, "store"] );
Route::post('/user/create',[ CreateUser::class, "store"] );
