<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            SettingSeeder::class,
            MenuSeeder::class,
            PartnerSeeder::class,
            DocumentTypeSeeder::class,
            DocumentSeeder::class,
            AchievementTypeSeeder::class,
            AchievementLevelSeeder::class,
            AchievementProgramStudiSeeder::class, 
            AchievementSeeder::class,
            EventSeeder::class,
            MetaTagSeeder::class,
            PageSeeder::class,
            EmployeeTypeSeeder::class,
            EmployeeStatusSeeder::class,
            EmployeeProgramStudisTableSeeder::class, 
            EmployeeSeeder::class,
            BannerSeeder::class,
            CooperationFieldSeeder::class,
            CooperationTypeSeeder::class,
            CooperationSeeder::class,
            AnnouncementSeeder::class,
            SasaranKinerjaSeeder::class,
            IndikatorKinerjaKegiatanSeeder::class,
            TargetRealisasiSeeder::class,
        ]);
    }
}
