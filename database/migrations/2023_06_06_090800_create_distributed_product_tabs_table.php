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
        Schema::create('distributed_product_tabs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tab_id')->constrained('tabs');
            $table->foreignId('distripution_product_id')->constrained('distripution_products');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('distributed_product_tabs');
    }
};
