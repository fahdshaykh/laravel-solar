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
        Schema::create('solarvaluessettings', function (Blueprint $table) {
            $table->id();
			$table->string('panelcapacity')->nullable();
			$table->string('paneloutput')->nullable();
			$table->string('dctoac')->nullable();
			$table->string('costperpanel')->nullable();
			$table->string('taxincentive')->nullable();
			$table->string('kwhrate')->nullable();
			$table->string('homevaluefactor')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solarvaluessettings');
    }
};
