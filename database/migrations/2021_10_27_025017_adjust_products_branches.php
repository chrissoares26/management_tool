<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdjustProductsBranches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function(Blueprint $table) {
            $table->id();
            $table->string('branch', 30);
            $table->timestamps();
        });
        //creating branch table
        Schema::create('product_branches', function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('product_id');
            $table->decimal('sales_price', 8, 2);
            $table->integer('min_stock');
            $table->integer('max_stock');
            $table->timestamps();

            //foreign keys
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('product_id')->references('id')->on('products');
        });
        


        Schema::table('products', function(Blueprint $table) {
            $table->dropColumn(['sales_price', 'min_stock', 'max_stock']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function(Blueprint $table) {
            $table->decimal('sales_price', 8, 2);
            $table->integer('min_stock');
            $table->integer('max_stock');
        });

        Schema::dropIfExists('product_branches');

        Schema::dropIfExists('branches');
    }
}
