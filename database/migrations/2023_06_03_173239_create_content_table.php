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
		Schema::create('contents', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->longText('description');
			$table->longText('long_description')->nullable();
			$table->longText('additional_information')->nullable();
      		$table->string('image_1')->nullable();
			$table->string('image_2')->nullable();
			$table->string('image_3')->nullable();
			$table->string('image_4')->nullable();
			$table->string('image_5')->nullable();
			$table->string('image_6')->nullable();
			$table->string('slug');
			$table->unsignedBigInteger('user_id');
			$table->unsignedBigInteger('slot_id');
			$table->timestamps();

			$table->foreign('slot_id')
				->references('id')
				->on('slots')
				->onDelete('cascade');
			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade');
		});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
