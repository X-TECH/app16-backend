<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUnnecessaryFieldsFromApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn('qr_token');

            $table->dropColumn('out_latitude');
            $table->dropColumn('out_longitude');

            $table->dropColumn('visiting_latitude');
            $table->dropColumn('visiting_longitude');

            $table->dropColumn('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {

            $table->string('qr_token')->after('id');

            $table->double('out_latitude')->nullable()->after('out_datetime');
            $table->double('out_longitude')->nullable()->after('out_latitude');

            $table->double('visiting_latitude')->nullable()->after('visiting_address_and_name');
            $table->double('visiting_longitude')->nullable()->after('visiting_latitude');

            $table->softDeletes()->after('updated_at');
        });
    }
}
