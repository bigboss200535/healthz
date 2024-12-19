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
        Schema::create('daily_attendance', function (Blueprint $table) {
            $table->id('attendance_id');
            $table->string('system_id')->index();
            $table->string('patient_no', 50)->nullable();
            $table->date('attendance_date', 50)->nullable();
            $table->timestamp('attendance_time')->nullable();
            $table->string('pat_age', 10)->nullable();
            $table->string('status_code', 50)->nullable();
            $table->string('registration_type', 50)->nullable(); //new or old
            $table->string('registration_status', 50)->nullable();//new or old
            $table->string('member_no', 50)->nullable();
            $table->string('is_insured', 50)->nullable();
            $table->string('episode_id', 50)->nullable(); //+1
            $table->string('sponsor_id', 50)->nullable();// sponsor_id or sponosor no
            $table->string('clinic_id', 50)->nullable();
            $table->string('age_code', 50)->nullable();
            $table->string('user_id', 10)->nullable();
            $table->string('facility_id', 50)->nullable();
            $table->string('added_id', 100)->nullable();
            $table->timestamp('added_date')->nullable();
            $table->string('updated_by', 100)->nullable();
            $table->string('status', 100)->default('Active')->index();
            $table->string('archived', 100)->default('No')->index();
            $table->string('archived_id', 100)->nullable();
            $table->string('archived_by', 100)->nullable();
            $table->date('archived_date', 100)->nullable();
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('facility_id')->references('facility_id')->on('facility');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dailyattendance');
    }
};
