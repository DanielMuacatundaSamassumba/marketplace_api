<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CreateCategory extends Controller
{
    public function store(CategoryRequest $data)
    {

        try {
            $response_data = Category::create($data->validated());
            return response()->json([
                "message" => "Category Crieted with success",
                "data" => new CategoryResource($response_data)
            ]);

        } catch (Exception $e) {
            return response()->json([
                "message" => "Error creating category",
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
