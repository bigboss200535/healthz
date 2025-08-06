<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $this->call([
            FacilitySeeder::class,
            UserRolesSeeder::class,
            GenderSeeder::class,
            UserSeeder::class,
            OccupationSeeder::class,
            PatientStatusSeeder::class,
            HealthFacilitySeeder::class,
            ServiceTypesSeeder::class,
            TitleSeeder::class,
            ReligionSeeder::class,
            RegionSeeder::class,
            RelationSeeder::class,
            AgeSeeder::class,
            AttendanceServiceSeeder::class,
            ClinicSeeder::class,
            SponsorTypeSeeder::class,
            SponsorsSeeder::class,
            // ClinicAttendanceTypeSeeder::class,
            ServiceAttendanceTypeSeeder::class,
            ServicesSeeder::class,
            ServiceFeeSeeder::class, //check excel data
            ServicePointSeeder::class,
            ServiceMDCSSeeder::class,
            ConsultingRoomSeeder::class,
            NhisDrugs::class,
            StoreSeeder::class,
            ICD10GroupSeeder::class,
            ProductPresentationSeeder::class,
            ProductTypeSeeder::class,
            ProductsSeeder::class,
            DiagnosisSeeder::class,
            ProductClassSeeder::class,
            NationalitySeeder::class,
            AgeGroupsSeeder::class,
            TownSeeder::class, 
            DocumentationRepoSeeder::class,
            ClinicalHistorySeeder::class,
            SystemicAreasSeeder::class,
            FrequenciesSeeder::class,
            PermissionRoleSeeder::class,
            PermissionsSeeder::class,
            UserCategoryAccessLevelSeeder::class,
            // UserPermissionsSeeder::class,
            UserPermissionTestSeeder::class
        ]);

        $users = \App\Models\User::factory(100)->create();
        $patients = \App\Models\Patient::factory(500)->create();

            foreach ($patients as $patient) {
                \App\Models\PatientOpdNumber::factory()->create([
                'patient_id' => $patient->patient_id,
                'opd_number' => 'A'.$faker->randomNumber(8, true).'/25',
                // 'user_id' =>  $user->user_id,
            ]);
            }
        // \App\Models\PatientOpdNumber::factory(5000)->create();
        // \App\Models\PatientAttendance::factory(100)->create();
        // \App\Models\ConsultingRoom::factory(10)->create();
        // \App\Models\Consultation::factory(100)->create();
        // \App\Models\Admissions::factory(100)->create();
        // \App\Models\PatientSponsor::factory(200)->create();
        
    }
}
