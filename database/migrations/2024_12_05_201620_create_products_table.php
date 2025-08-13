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
        Schema::create('product_class', function (Blueprint $table) {
            $table->string('product_class_id', 50)->primary();
            $table->string('class_name', 50)->nullable();
            $table->string('type_code', 50)->nullable();
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
            // key
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('facility_id')->references('facility_id')->on('facility');
            
        });

        Schema::create('product_type', function (Blueprint $table) {
            $table->string('product_type_id', 50)->primary();
            $table->string('product_type', 150)->nullable();
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
            // key
            $table->foreign('facility_id')->references('facility_id')->on('facility');           
            $table->foreign('user_id')->references('user_id')->on('users');
        });

         Schema::create('stores', function (Blueprint $table) {
            $table->string('store_id', 50)->primary();
            $table->string('store', 50)->nullable();
            $table->string('is_pharmacy', 50)->nullable();
            $table->string('is_ward', 50)->nullable();
            $table->string('is_store', 50)->nullable();
            $table->string('facility_id', 50)->nullable();
            $table->string('user_id', 100)->nullable();
            $table->string('added_id', 100)->nullable();
            $table->timestamp('added_date')->nullable();
            $table->string('updated_by', 100)->nullable();
            $table->string('status', 100)->default('Active')->index();
            $table->string('archived', 100)->default('No')->index();
            $table->string('archived_id', 100)->nullable();
            $table->string('archived_by', 100)->nullable();
            $table->date('archived_date', 100)->nullable();
            // key
            $table->foreign('facility_id')->references('facility_id')->on('facility');           
            $table->foreign('user_id')->references('user_id')->on('users');
        });

        Schema::create('products', function (Blueprint $table) {
            $table->string('product_id', 50)->primary();
            $table->string('product_name', 150)->nullable();
            $table->string('default_method', 50)->nullable();
            $table->string('prescription_qty', 10)->nullable();
            $table->string('store_id', 50)->nullable();
            $table->string('product_class_id', 50)->nullable();
            $table->string('product_class', 50)->nullable();
            $table->string('manufacturer', 50)->nullable();
            $table->string('nhis_id', 50)->nullable();
            $table->string('nhis_cover', 50)->nullable()->default('No');
            $table->string('expirable', 50)->nullable()->default('No');
            $table->string('product_type', 50)->nullable()->default('Drug');// drug, consumable, stationaries
            $table->string('is_stockable', 50)->nullable()->default('No');
            $table->string('short_presentation', 50)->nullable();// tab, cap, course, pack, supp, inj
            $table->string('presentation', 50)->nullable();
            $table->string('pres_quanity_per_issue_unit', 50)->nullable();
            $table->string('pres_unit_quantity', 50)->nullable();
            $table->string('base_unit', 50)->nullable();
            $table->string('unit_base', 50)->nullable();
            $table->string('gender_id', 50)->nullable();
            $table->string('age_id', 50)->nullable();
            $table->string('prescription_level', 50)->nullable();
            $table->string('product_type_id', 50)->nullable();
            $table->float('average_unit_price')->nullable();
            $table->string('pres_unit_code')->nullable();
            $table->string('pres_qty_per_unit')->nullable();
            $table->string('pres_qty_per_issue_unit')->nullable();
            $table->string('patient_type')->nullable();
            $table->string('allow_copay')->nullable();
            $table->string('check_prescriped_qty')->nullable()->default('No');
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
            // key
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('facility_id')->references('facility_id')->on('facility');
            $table->foreign('store_id')->references('store_id')->on('stores');
            $table->foreign('gender_id')->references('gender_id')->on('gender');
            $table->foreign('age_id')->references('age_id')->on('ages');
            $table->foreign('product_class_id')->references('product_class_id')->on('product_class');
            $table->foreign('product_type_id')->references('product_type_id')->on('product_type');
        });

        Schema::create('product_stocked', function (Blueprint $table) {
            $table->string('stocked_id', 50)->primary();
            $table->string('product_id', 50)->nullable();
            $table->float('unit_price')->nullable();
            $table->decimal('stock_level', 10)->nullable();
            $table->date('expiry_date')->nullable();
            $table->string('batch', 50)->nullable();
            $table->string('store_id', 50)->nullable();
            $table->string('user_id', 50)->nullable();
            $table->string('facility_id', 50)->nullable();
            $table->string('added_id', 100)->nullable();
            $table->timestamp('added_date')->nullable();
            $table->string('updated_by', 100)->nullable();
            $table->string('status', 100)->default('Active')->index();
            $table->string('archived', 100)->default('No')->index();
            $table->string('archived_id', 100)->nullable();
            $table->string('archived_by', 100)->nullable();
            $table->date('archived_date', 100)->nullable();
            // key
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('facility_id')->references('facility_id')->on('facility');
            $table->foreign('store_id')->references('store_id')->on('stores');
            $table->foreign('product_id')->references('product_id')->on('products');
        });

        Schema::create('product_prices', function (Blueprint $table) {
                $table->string('product_id', 50)->nullable();
                $table->double('unit_cost', 10,2);
                $table->double('cash_price', 10,2)->nullable();
                $table->double('cooperate_price', 10,2)->nullable();
                $table->double('private_insurance_price', 10,2)->nullable();
                $table->double('nhis_amount', 10,2)->nullable();
                $table->double('nhis_topup', 10,2)->nullable();
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
                // key
                $table->foreign('user_id')->references('user_id')->on('users');
                $table->foreign('facility_id')->references('facility_id')->on('facility');
                $table->foreign('product_id')->references('product_id')->on('products');
        });

        Schema::create('product_presentation', function (Blueprint $table) {
            $table->string('pp_id', 50)->primary();
            $table->string('presentation', 50)->nullable();
            $table->string('type_code', 50)->nullable()->default('1');
            $table->string('is_active', 50)->nullable()->default('Yes');
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
            // key
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('facility_id')->references('facility_id')->on('facility');
        });

        Schema::create('nhis_drugs', function (Blueprint $table) {
            $table->string('nhis_id', 50)->primary();
            $table->string('drug_name', 200)->nullable();
            $table->string('pricing_unit', 50)->nullable();
            $table->float('price')->nullable()->default('0.00');
            $table->string('prescription_level')->nullable();
            $table->string('is_active', 50)->nullable()->default('Yes');
            $table->string('pricing_factor', 50)->nullable()->default('0'); //0 or 1
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
            // key
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
        Schema::dropIfExists('product_class');
        Schema::dropIfExists('product_type');
        Schema::dropIfExists('stores');
        Schema::dropIfExists('products');
        Schema::dropIfExists('stocked_product');
        Schema::dropIfExists('product_prices');
        Schema::dropIfExists('product_presentation');
        Schema::dropIfExists('nhis_drugs');
    }
};
