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
        Schema::table('distripution_products', function (Blueprint $table) {
            if (!Schema::hasColumn('distripution_products', 'serial_number')) {
                $table->string('serial_number')->nullable();
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
        Schema::table('distripution_products', function (Blueprint $table) {
            //
        });
    }
};
