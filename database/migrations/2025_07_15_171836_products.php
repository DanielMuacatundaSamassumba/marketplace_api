<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::create("products", function(Blueprint $table){
        $table->uuid('id')->primary();
        $table->string("name")->nullable();
        $table->text("description")->nullable();
        $table->decimal("price", 10, 2)->nullable();
        $table->string("image_path")->nullable();
        $table->foreignId(   "user_id")->constrained()->onDelete('cascade');
        $table->foreignId("category_id")->constrained()->onDelete('cascade');
        $table->timestamps();
      });
    }
};
