<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('nhia_mdcs', function (Blueprint $table) {
            $table->string('mdcs_id', 50)->primary();
            $table->string('mdc', 100);
            $table->string('age_id', 100)->nullable();
            $table->string('gender_id', 100);
            $table->string('service_type_id', 50);
            $table->string('is_mdc', 50)->nullable();
            $table->string('specialty_code', 50)->nullable();
            $table->string('is_capitation', 50)->nullable();
            $table->string('code', 100)->index();
            $table->string('usage', 50)->nullable()->default('0');
            $table->string('facility_id', 50)->nullable();
            $table->string('user_id', 100)->nullable();
            $table->timestamp('added_date')->nullable();
            $table->string('updated_by', 100)->nullable();
            $table->string('status', 100)->default('Active')->index();
            $table->string('archived', 100)->default('No')->index();
            $table->string('archived_id', 100)->nullable();
            $table->string('archived_by', 100)->nullable();
            $table->date('archived_date', 100)->nullable();
            // key
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('age_id')->references('age_id')->on('ages');
            $table->foreign('gender_id')->references('gender_id')->on('gender');
            // $table->foreign('service_type_id')->references('service_type_id')->on('service_types');
        });

        // DB::unprepared (file_get_contents(__DIR__. 'mdcs.sql'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhia_mdcs');
    }
};
