<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     use HasUuids;
 public function user (){
     return $this->belongsTo(related: User::class, foreignKey: "user_id");
 }
 public function category (){
     return $this->belongsTo(related: Category::class, foreignKey: 'category_id');
 }
}
