<?php

namespace App\Http\Controllers\Services;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
 class FindUserByEmail extends Controller
{
    public function findUserEmail($email)
    {
        return User::where("email", $email)->first();
    }
}
