<?php

namespace Database\Seeders;

use App\Models\Permission;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $webPermission = collect([
            # Dashboard related permission
            ['name' => 'read-dashboards', 'label' => 'Baca Dashboard'],
            # Roles related permission
            ['name' => 'read-roles', 'label' => 'Baca Role'],
            ['name' => 'create-roles', 'label' => 'Buat Role'],
            ['name' => 'update-roles', 'label' => 'Update Role'],
            ['name' => 'delete-roles', 'label' => 'Hapus Role'],
            ['name' => 'change-permissions', 'label' => 'Edit Hak Akses'],

            # Employee related permission
            ['name' => 'read-employees', 'label' => 'Baca Staff'],
            ['name' => 'create-employees', 'label' => 'Buat Staff'],
            ['name' => 'update-employees', 'label' => 'Update Staff'],
            ['name' => 'delete-employees', 'label' => 'Hapus Staff'],
            # Employee type related permission
            ['name' => 'read-employee-types', 'label' => 'Baca Jenis Staff'],
            ['name' => 'create-employee-types', 'label' => 'Buat Jenis Staff'],
            ['name' => 'update-employee-types', 'label' => 'Update Jenis Staff'],
            ['name' => 'delete-employee-types', 'label' => 'Hapus Jenis Staff'],

             // Employee Program Studi related permissions
             ['name' => 'read-employee-program-studis', 'label' => 'Baca Program Studi Dari Pegawai'],
             ['name' => 'create-employee-program-studis', 'label' => 'Buat Program Studi Dari Pegawai'],
             ['name' => 'update-employee-program-studis', 'label' => 'Update Program Studi Dari Pegawai'],
             ['name' => 'delete-employee-program-studis', 'label' => 'Hapus Program Studi Dari Pegawai'],

            # Employee status related permission
            ['name' => 'read-employee-statuses', 'label' => 'Baca Status Staff'],
            ['name' => 'create-employee-statuses', 'label' => 'Buat Status Staff'],
            ['name' => 'update-employee-statuses', 'label' => 'Update Status Staff'],
            ['name' => 'delete-employee-statuses', 'label' => 'Hapus Status Staff'],

             # Achievement Program Studi related permission
             ['name' => 'read-achievement-program-studis', 'label' => 'Baca Prestasi Dari Program Studi'],
             ['name' => 'create-achievement-program-studis', 'label' => 'Buat Prestasi Dari Program Studi'],
             ['name' => 'update-achievement-program-studis', 'label' => 'Update Prestasi Dari Program Studi'],
             ['name' => 'delete-achievement-program-studis', 'label' => 'Hapus Prestasi Dari Program Studi'],

            # Achievement type related permission
            ['name' => 'read-achievement-types', 'label' => 'Baca Jenis Prestasi'],
            ['name' => 'create-achievement-types', 'label' => 'Buat Jenis Prestasi'],
            ['name' => 'update-achievement-types', 'label' => 'Update Jenis Prestasi'],
            ['name' => 'delete-achievement-types', 'label' => 'Hapus Jenis Prestasi'],
            # Achievement level related permission
            ['name' => 'read-achievement-levels', 'label' => 'Baca Tingkat Prestasi'],
            ['name' => 'create-achievement-levels', 'label' => 'Buat Tingkat Prestasi'],
            ['name' => 'update-achievement-levels', 'label' => 'Update Tingkat Prestasi'],
            ['name' => 'delete-achievement-levels', 'label' => 'Hapus Tingkat Prestasi'],
             # Achievement lrelated permission
             ['name' => 'read-achievements', 'label' => 'Baca Prestasi'],
             ['name' => 'create-achievements', 'label' => 'Buat Prestasi'],
             ['name' => 'update-achievements', 'label' => 'Update Prestasi'],
             ['name' => 'delete-achievements', 'label' => 'Hapus Prestasi'],

            # Document type related permission
            ['name' => 'read-document-types', 'label' => 'Baca Jenis Dokumen'],
            ['name' => 'create-document-types', 'label' => 'Buat Jenis Dokumen'],
            ['name' => 'update-document-types', 'label' => 'Update Jenis Dokumen'],
            ['name' => 'delete-document-types', 'label' => 'Hapus Jenis Dokumen'],
            # Document related permission
            ['name' => 'read-documents', 'label' => 'Baca Dokumen'],
            ['name' => 'create-documents', 'label' => 'Buat Dokumen'],
            ['name' => 'update-documents', 'label' => 'Edit Dokumen'],
            ['name' => 'delete-documents', 'label' => 'Hapus Dokumen'],

            # Cooperation field related permission
            ['name' => 'read-cooperation-fields', 'label' => 'Baca Bidang Kerjasama'],
            ['name' => 'create-cooperation-fields', 'label' => 'Buat Bidang Kerjasama'],
            ['name' => 'update-cooperation-fields', 'label' => 'Update Bidang Kerjasama'],
            ['name' => 'delete-cooperation-fields', 'label' => 'Hapus Bidang Kerjasama'],

            # Cooperation type related permission
            ['name' => 'read-cooperation-types', 'label' => 'Baca Jenis Kerjasama'],
            ['name' => 'create-cooperation-types', 'label' => 'Buat Jenis Kerjasama'],
            ['name' => 'update-cooperation-types', 'label' => 'Update Jenis Kerjasama'],
            ['name' => 'delete-cooperation-types', 'label' => 'Hapus Jenis Kerjasama'],

            # Cooperation related permission
            ['name' => 'read-cooperations', 'label' => 'Baca Kerjasama Industri'],
            ['name' => 'create-cooperations', 'label' => 'Buat Kerjasama Industri'],
            ['name' => 'update-cooperations', 'label' => 'Update Kerjasama Industri'],
            ['name' => 'delete-cooperations', 'label' => 'Hapus Kerjasama Industri'],


            # Event related permission
            ['name' => 'read-events', 'label' => 'Baca Event'],
            ['name' => 'create-events', 'label' => 'Buat Event'],
            ['name' => 'update-events', 'label' => 'Update Event'],
            ['name' => 'delete-events', 'label' => 'Hapus Event'],


            // Indikator Kinerja Utama related permissions
            ['name' => 'read-indikator-kinerjas', 'label' => 'Baca Indikator Kinerja'],
            ['name' => 'create-indikator-kinerjas', 'label' => 'Buat Indikator Kinerja'],
            ['name' => 'update-indikator-kinerjas', 'label' => 'Update Indikator Kinerja'],
            ['name' => 'delete-indikator-kinerjas', 'label' => 'Hapus Indikator Kinerja'],

            # Sasaran Kinerja permissions
            ['name' => 'read-sasaran-kinerjas', 'label' => 'Baca Sasaran Kinerja'],
            ['name' => 'create-sasaran-kinerjas', 'label' => 'Buat Sasaran Kinerja'],
            ['name' => 'update-sasaran-kinerjas', 'label' => 'Update Sasaran Kinerja'],
            ['name' => 'delete-sasaran-kinerjas', 'label' => 'Hapus Sasaran Kinerja'],

            # Indikator Kinerja Kegiatan permissions
            ['name' => 'read-indikator-kinerja-kegiatans', 'label' => 'Baca Indikator Kinerja Kegiatan'],
            ['name' => 'create-indikator-kinerja-kegiatans', 'label' => 'Buat Indikator Kinerja Kegiatan'],
            ['name' => 'update-indikator-kinerja-kegiatans', 'label' => 'Update Indikator Kinerja Kegiatan'],
            ['name' => 'delete-indikator-kinerja-kegiatans', 'label' => 'Hapus Indikator Kinerja Kegiatan'],

            # Target Realisasi permissions
            ['name' => 'read-target-realisasis', 'label' => 'Baca Target Realisasi'],
            ['name' => 'create-target-realisasis', 'label' => 'Buat Target Realisasi'],
            ['name' => 'update-target-realisasis', 'label' => 'Update Target Realisasi'],
            ['name' => 'delete-target-realisasis', 'label' => 'Hapus Target Realisasi'],



            # Users related permission
            ['name' => 'read-users', 'label' => 'Baca User'],
            ['name' => 'create-users', 'label' => 'Buat User'],
            ['name' => 'update-users', 'label' => 'Edit User'],
            ['name' => 'delete-users', 'label' => 'Hapus User'],

            # Menu related permission
            ['name' => 'read-menus', 'label' => 'Baca Menu'],
            ['name' => 'create-menus', 'label' => 'Buat Menu'],
            ['name' => 'update-menus', 'label' => 'Edit Menu'],
            ['name' => 'delete-menus', 'label' => 'Hapus Menu'],

             # Page related permission
             ['name' => 'read-pages', 'label' => 'Baca Page'],
             ['name' => 'create-pages', 'label' => 'Buat Page'],
             ['name' => 'update-pages', 'label' => 'Edit Page'],
             ['name' => 'delete-pages', 'label' => 'Hapus Page'],


            # Agency related permission
            ['name' => 'read-partners', 'label' => 'Baca Industri'],
            ['name' => 'create-partners', 'label' => 'Buat Industri'],
            ['name' => 'update-partners', 'label' => 'Edit Industri'],
            ['name' => 'delete-partners', 'label' => 'Hapus Industri'],
            # Settings related permissions
            ['name' => 'read-settings', 'label' => 'Akses Pengaturan'],
            ['name' => 'update-settings', 'label' => 'Perbarui Pengaturan'],


        ]);

        $this->insertPermission($webPermission);
    }

    private function insertPermission(Collection $permissions, $guardName = 'web')
    {
        Permission::insert($permissions->map(function ($permission) use ($guardName) {
            return [
                'name' => $permission['name'],
                'display_name' => $permission['label'],
                'guard_name' => $guardName,
                'created_at' => Carbon::now()
            ];
        })->toArray());
    }
}
