<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class CreateUser extends Controller
{
    public function store(UserRequest $data)
    {
        try {
            $role = $data->validated()["role"];
            if ($role == "nomal_user") {
                $permitions = [
                    "view_products",
                    "view_categories",
                    "view_own_profile",
                    "update_own_profile",
                ];

            }
            if ($role == "admin") {
                $permitions = [
                    "view_products",
                    "view_categories",
                    "create_product",
                    "update_product",
                    "delete_product",
                    "create_category",
                    "update_category",
                    "delete_category",
                    "view_users",
                    "create_user",
                    "update_user",
                    "delete_user",
                    "view_own_profile",
                    "update_own_profile",
                ];
            }
            $response_data = User::create([
                "name" => $data->validated()["name"],
                "email" => $data->validated()["email"],
                "phone_number" => $data->input("phone_number") ?? null,
                "status" => $data->validated()["status"],
                "role" => $role,
                "permitions" => json_encode($permitions),
                "image_path" => $data->validated()["image_path"]
            ]);
            

            return response()->json([
                "message" => "user Created with success",
                "data" => new UserResource($response_data)
            ]);

        } catch (Exception $e) {
            return response()->json([
                "message" => "Error creating user",
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
