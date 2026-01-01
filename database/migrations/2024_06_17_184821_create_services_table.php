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
            $table->string('age_id', 50)->nullable()->index();
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
            // key
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('age_id')->references('age_id')->on('ages');
            $table->foreign('gender_id')->references('gender_id')->on('gender');
        });

        Schema::create('services_fee', function (Blueprint $table) {
            $table->string('service_fee_id', 50)->primary();
            $table->string('service_id', 50);
            $table->string('service', 100);
            $table->string('service_type_id', 50);
            $table->float('cash_amount')->nullable();
            $table->float('private_amount')->nullable();
            $table->float('company_amount')->nullable();
            $table->float('foreigners_amount')->nullable();
            $table->float('nhis_adult', 8,2)->nullable();
            $table->float('nhis_child')->nullable();
            $table->string('allow_nhis', 100)->nullable();
            $table->string('gdrg_adult', 100)->nullable();
            $table->string('gdrg_child', 100)->nullable();
            $table->string('allow_topup', 100)->nullable();
            $table->decimal('topup_amount', 10,2)->nullable()->default('0');
            $table->string('editable', 100)->nullable();
            $table->string('delivery_mode', 100)->nullable(); //INTERNAL or EXTERNAL
            $table->string('gender_id', 50)->nullable();
            $table->string('age_id', 50)->nullable()->index();
            $table->string('patient_type', 50)->nullable(); //IN, OUT, ALL
            $table->string('is_active', 50)->nullable(); //YES, NO,
            $table->string('facility_id', 50)->nullable();
            $table->string('user_id', 100)->nullable();
            $table->timestamp('added_date')->nullable();
            $table->string('updated_by', 100)->nullable();
            $table->string('status', 100)->default('Active')->index();
            $table->string('archived', 100)->default('No')->index();
            $table->string('archived_id', 100)->nullable();
            $table->string('archived_by', 100)->nullable();
            $table->date('archived_date', 100)->nullable();
            // $table->primary('service_fee_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('service_id')->references('service_id')->on('services');
            // $table->foreign('service_type_id')->references('service_type_id')->on('service_types');
            // $table->foreign('user_id')->references('user_id')->on('users');
            // $table->foreign('age_id')->references('age_id')->on('ages');
            $table->foreign('gender_id')->references('gender_id')->on('gender');
        });


        Schema::create('service_points', function (Blueprint $table) {
            $table->string('service_point_id', 50)->primary();
            $table->string('service_points', 100);
            $table->string('attendance_type_id', 50);
            $table->string('clinic_id', 100)->nullable(); 
            $table->string('folder_creation', 100)->nullable();
            $table->string('patient_type', 100)->nullable();
            $table->string('folder_prefix', 100)->nullable();
            $table->string('folder_lenght', 100)->default('6');
            $table->string('year_lenght', 100)->default('2');
            $table->string('gender_id', 50)->nullable();
            $table->string('generate_folder_location', 50)->nullable();
            $table->string('allow_capitation', 50)->nullable();
            $table->string('opd_system', 50)->nullable();//always
            $table->string('queue_time_base_on', 50)->nullable()->default('Service Request');//always
            $table->string('age_id', 50)->nullable();
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
            // key
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('age_id')->references('age_id')->on('ages');
            $table->foreign('gender_id')->references('gender_id')->on('gender');
            $table->foreign('attendance_type_id')->references('attendance_type_id')->on('service_attendance_type');
            $table->foreign('clinic_id')->references('clinic_id')->on('clinics');
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
        Schema::dropIfExists('services_fee');
        Schema::dropIfExists('service_points');
    }
};
