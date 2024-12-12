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
        Schema::create('admission_beds', function (Blueprint $table) {
            $table->string('bed_id',50);
            $table->string('bed_number',150); 
            $table->string('ward_id',150); 
            $table->string('bed_condition',150);//free or occupaid 
            $table->string('bed_type',150);//real or virtual 
            $table->string('admission_record',150);
            $table->string('admission_opd_no',150);
            $table->string('facility_id', 50)->nullable(); 
            $table->string('user_id',50);        
            $table->string('added_id', 50)->nullable();
            $table->string('added_by', 100)->nullable();
            $table->date('added_date')->nullable();
            $table->string('updated_by', 100)->nullable();
            $table->date('updated_date')->nullable();
            $table->string('status', 100)->default('Active');
            $table->string('archived', 100)->default('No');
            $table->date('archived_date')->nullable();
            $table->string('archived_by', 100)->nullable();
            $table->primary('bed_id');
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
        Schema::dropIfExists('admission_beds');
    }
};
