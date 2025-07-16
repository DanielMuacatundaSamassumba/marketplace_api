<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use App\Http\Controllers\Services\FindUserByEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Services\Permitions;

class CreateUser extends Controller
{
    public function store(UserRequest $data)
    {

        $user = (new FindUserByEmail())->findUserEmail($data->validated()["email"]);
        if ($user) {
            return response()->json([
                "message" => " user already exists with this email",
            ], 409);
        } else {
            try {
                $response_data = User::create([
                    "name" => $data->validated()["name"],
                    "email" => $data->validated()["email"],
                    "phone_number" => "951051700",
                    "password" => bcrypt($data->validated()["password"]),
                    "status" => "1",
                    "roles" => json_encode([$data->validated()["roles"]]),
                    "permitions" => json_encode((new Permitions())->permitionsOfUser($data->validated()["roles"])),
                    "image_path" => null
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
}
