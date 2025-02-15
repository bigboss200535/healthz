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
        Schema::create('services', function (Blueprint $table) {
            //service_places link to 
            $table->string('service_id', 50)->primary();
            $table->string('service_name', 100);
            $table->string('gender_id', 50)->nullable();
            $table->string('age_id', 50)->nullable();
            $table->string('patient_type', 50)->nullable(); //in, out, all
            $table->string('is_store', 50)->nullable(); //yes, no,
            $table->string('is_ward', 50)->nullable(); //yes, no,
            $table->string('ser_no', 50)->nullable(); //yes, no,
            $table->string('is_morgue', 50)->nullable(); //yes, no,
            $table->string('is_direct_service', 50)->nullable(); //yes, no,
            $table->string('is_active', 50)->nullable(); //yes, no,
            $table->string('facility_id', 50)->nullable();
            $table->string('user_id', 100)->nullable();
            $table->timestamp('added_date')->nullable();
            $table->string('updated_by', 100)->nullable();
            $table->string('status', 100)->default('Active')->index();
            $table->string('archived', 100)->default('No')->index();
            $table->string('archived_id', 100)->nullable();
            $table->string('archived_by', 100)->nullable();
            $table->date('archived_date', 100)->nullable();
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('age_id')->references('age_id')->on('ages');
            $table->foreign('gender_id')->references('gender_id')->on('gender');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
};
