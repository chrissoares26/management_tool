<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableSiteContactsAddFkContactReasons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //adding column 
        Schema::table('site_contacts', function (Blueprint $table) {
            $table->unsignedBigInteger('contact_reasons_id');
        });

        DB::statement('update site_contacts set contact_reasons_id = contact_reason');

        //creating fk and remove column
        Schema::table('site_contacts', function (Blueprint $table) {
            $table->foreign('contact_reasons_id')->references('id')->on('contact_reasons');
            $table->dropColumn('contact_reason');
        });

        

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_contacts', function (Blueprint $table) {
            $table->integer('contact_reason');
            $table->dropForeign('site_contacts_contact_reasons_id_foreign');
        });

        DB::statement('update site_contacts set contact_reason = contact_reasons_id');

        Schema::table('site_contacts', function (Blueprint $table) {
            $table->dropColumn('contact_reasons_id');
        });
    }
}
