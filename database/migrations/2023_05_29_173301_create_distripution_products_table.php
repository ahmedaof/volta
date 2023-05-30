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
        Schema::create('distripution_products', function (Blueprint $table) {
            $table->id();
            $table->string('abb_id')->nullable();
            $table->string('abb_description')->nullable();
            $table->string('abb_price')->nullable();
            $table->string('quantity')->default(0);
            $table->string('abb_discount')->nullable();
            $table->foreignId('product_family_id')->nullable()->constrained('product_families')->onDelete('cascade');
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
        Schema::dropIfExists('distripution_products');
    }
};
