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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            // distripution_products id
            $table->foreignId('distripution_product_id')->constrained('distripution_products');
            // qty
            $table->integer('quantity')->nullable();

            // price after discount
            $table->string('price_after_discount')->nullable();

            // price after discount with vat
            $table->string('price_after_discount_with_vat')->nullable();

            // total price after discount without vat
            $table->string('total_price_after_discount_without_vat')->nullable();

            // total price after discount with vat
            $table->string('total_price_after_discount_with_vat')->nullable();

            // total price with vat
            $table->string('total_price_with_vat')->nullable();
            
            // total price without vat
            $table->string('total_price_without_vat')->nullable(); 

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
        Schema::dropIfExists('projects');
    }
};
