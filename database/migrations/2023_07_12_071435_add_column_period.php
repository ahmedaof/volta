<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('main_projects', function (Blueprint $table) {
            if (!Schema::hasColumn('main_projects', 'period')) {
                $table->string('period')->default('2 يوم');
                // before period    
                $table->string('before_period')->default('50');
                // after period
                $table->string('after_period')->default('50');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('main_projects', function (Blueprint $table) {
            //
        });
    }
};
