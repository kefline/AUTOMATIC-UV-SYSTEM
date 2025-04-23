<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('system_statuses', function (Blueprint $table) {
            $table->float('total_charging')->nullable()->after('battery_level');
            $table->float('min_charging')->nullable();
            $table->float('max_charging')->nullable();
            $table->float('power_usage')->nullable();
            $table->float('one_hour_usage')->nullable();
            $table->float('yield')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('system_statuses', function (Blueprint $table) {
            $table->dropColumn([
                'total_charging',
                'min_charging',
                'max_charging',
                'power_usage',
                'one_hour_usage',
                'yield'
            ]);
        });
    }
};
