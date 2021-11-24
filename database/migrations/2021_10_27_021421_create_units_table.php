<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('unit', 5);
            $table->string('description', 30);
            $table->timestamps();
        });

        Schema::table('products', function(Blueprint $table) {
            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id')->references('id')->on('units');
        });
        Schema::table('product_details', function(Blueprint $table) {
            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id')->references('id')->on('units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //remove the relationship with product_details
        Schema::table('product_details', function(Blueprint $table) {
            //remove fk
            $table->dropForeign('product_details_unit_id_foreign');
            //remove column
            $table->dropColumn('unit_id');
        });
        Schema::table('products', function(Blueprint $table) {
            //remove fk
            $table->dropForeign('products_unit_id_foreign');
            //remove column
            $table->dropColumn('unit_id');
        });

        Schema::dropIfExists('units');
    }
}
