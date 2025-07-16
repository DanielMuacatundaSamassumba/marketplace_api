<?php 
namespace App\Http\Controllers\Services;
use App\Http\Controllers\Controller;

 class Permitions extends Controller{
  public  function permitionsOfUser(string $user){
        if($user == "normal_user"){
          return [
              "view_products",
              "view_categories",
              "view_own_profile",
              "update_own_profile",
          ];
        }
        if($user == "admin"){
          return [
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
       return [];
      }
 }