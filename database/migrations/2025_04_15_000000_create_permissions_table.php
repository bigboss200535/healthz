<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // general permission here
        Schema::create('permissions', function (Blueprint $table) {
            $table->string('permission_id', 50)->primary();
            $table->string('role_id', 50)->nullable();
            $table->string('permission_name', 150);
            $table->string('user_id', 50)->nullable();
            $table->string('facility_id', 50)->nullable();
            $table->string('added_id', 50)->nullable();
            $table->timestamp('added_date')->nullable();
            $table->string('updated_by', 100)->nullable();
            $table->string('status', 50)->default('Active')->index();
            $table->string('archived', 50)->default('No')->index();
            $table->string('archived_id', 50)->nullable();
            $table->string('archived_by', 100)->nullable();
            $table->date('archived_date', 100)->nullable();
            // Foreign key constraint
            $table->foreign('role_id')->references('role_id')->on('permission_role');
            $table->foreign('facility_id')->references('facility_id')->on('facility');
            $table->foreign('user_id')->references('user_id')->on('users');
        });

        // Suggested permissions for the sidebar functionality
        // $permissions = [
        //     // Dashboard
        //     'dashboard_view',
            
        //     // Patient Management
        //     'patient_create',
        //     'patients_search',
        //     'patient_modify',
        //     // 'patient_delete',
        //     'patient_sponsors',
        //     'patient_attendance_view',
            
        //     // Nurse Management
        //     'vital_signs',
        //     'nurse_notes',
        //     '24hour_report',
        //     'medications',
            
        //     // Out-Patient Management
        //     'manage_out_patients',
        //     'out_consultations',

        //     // In-Patient Management
        //     'manage_in_patients',
        //     'view_in_patient_records',
        //     'in_consultations',
        //     'surgery',
        //     'discharges',
            
        //     // User Management
        //     'create_user',
        //     'users_view',
        //     'edit_user',
        //     'delete_user',
        //     'manage_user_roles',
            
        //     // Reports
        //     'generate_reports',
        //     'view_statistics',
            
        //     // Settings
        //     'manage_system_settings',
        //     'manage_facilities',
            
        //     // Audit Logs
        //     'view_audit_logs',
            
        //     // Permissions
        //     'manage_permissions',
        //     'assign_permissions'
        // ];

        // Insert default permissions
        // foreach ($permissions as $permission) {
        //     DB::table('permissions')->insert([
        //         'permission_id' => Str::uuid(),
        //         // 'user_id' => 'a2c362bf-56df-4337-be34-0062ffae8bd5', 
        //         'permission_name' => $permission,
        //         'is_granted' => true,
        //         'added_date' => now()
        //         // 'updated_at' => now()
        //     ]);
        // }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
};