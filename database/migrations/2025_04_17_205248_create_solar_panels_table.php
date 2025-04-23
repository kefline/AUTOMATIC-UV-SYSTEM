<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('solar_panels', function (Blueprint $table) {
            $table->id();
            $table->string('panel_id')->unique();
            $table->enum('status', ['active', 'inactive', 'maintenance'])->default('active');
            $table->float('current_angle')->default(0);
            $table->float('current_efficiency')->default(0);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solar_panels');
    }
};
