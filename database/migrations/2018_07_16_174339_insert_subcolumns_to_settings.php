<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertSubcolumnsToSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->text('about');
            $table->string('opening_hours');
            $table->string('contact_email_desc');
            $table->string('address_detailed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('about');
            $table->dropColumn('opening_hours');
            $table->dropColumn('contact_email_desc');
            $table->dropColumn('address_detailed');
        });
    }
}
