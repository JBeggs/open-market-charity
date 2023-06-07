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
		Schema::create('slots', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->string('slug');
            $table->timestamps();
            
            $table->unsignedBigInteger('user_id');
			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade');
		});
        DB::table('slots')->insert(array('name'=>'Home Hero', 'slug'=>Str::slug('Home Hero'), 'user_id'=>1));
        DB::table('slots')->insert(array('name'=>'Home Card 1', 'slug'=>Str::slug('Home Card 1'), 'user_id'=>1));
        DB::table('slots')->insert(array('name'=>'Home Card 2', 'slug'=>Str::slug('Home Card 2'), 'user_id'=>1));
        DB::table('slots')->insert(array('name'=>'Home Card 3', 'slug'=>Str::slug('Home Card 3'), 'user_id'=>1));
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slots');
    }
};
