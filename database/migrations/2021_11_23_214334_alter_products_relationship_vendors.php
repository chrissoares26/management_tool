<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProductsRelationshipVendors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create column in products that will receive the fk from vendors
        Schema::table('products', function(Blueprint $table) {

            //insert a valje to vendor to establish the relation
            $vendor_id = DB::table('vendors')->insertGetId([
                'name' => 'Standard Vendor',
                'site' => 'standardvendor.com',
                'state' => 'NY',
                'email' => 'contact@standardvendor.com'
            ]);

            $table->unsignedBigInteger('vendor_id')->default($vendor_id)->after('id');
            $table->foreign('vendor_id')->references('id')->on('vendors');
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
        $table->dropForeign('products_vendor_id_foreign');
        $table->dropColumn('vendor_id');
    });
    }
}
