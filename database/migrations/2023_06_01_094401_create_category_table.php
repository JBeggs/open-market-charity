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
		Schema::create('categories', function (Blueprint $table) {
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
        DB::table('categories')->insert(array('name'=>'Trade', 'slug'=>'trade', 'user_id'=>1));
        DB::table('categories')->insert(array('name'=>'Give Away', 'slug'=>'give-away', 'user_id'=>1));
        DB::table('categories')->insert(array('name'=>'Sell', 'slug'=>'sell', 'user_id'=>1));
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
