<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();

            $table->string('device_token')->index();

            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');

            $table->string('out_address');
            $table->dateTime('out_datetime');
            $table->double('out_latitude');
            $table->double('out_longitude');

            $table->string('visiting_address_and_name');
            $table->double('visiting_latitude');
            $table->double('visiting_longitude');
            $table->string('visiting_reason');
            $table->dateTime('planned_return_datetime');

            $table->dateTime('finished_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
