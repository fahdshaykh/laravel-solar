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
        Schema::create('proposalfronts', function (Blueprint $table) {
            $table->id();
			$table->string('inputaddress')->nullable();
			$table->string('sunshine')->nullable();
			$table->string('roofarea')->nullable();
			$table->string('maxpanel')->nullable();
			$table->string('co2')->nullable();
			$table->string('panelcount')->nullable();
			$table->string('yenergy')->nullable();
			$table->string('sqfeet')->nullable();
			$table->string('city')->nullable();
			$table->string('zip')->nullable();
			$table->string('state')->nullable();
			$table->string('country')->nullable();
			$table->string('lati')->nullable();
			$table->string('longi')->nullable();
		    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposalfronts');
    }
};
