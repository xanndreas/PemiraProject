<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'audit_log_show',
            ],
            [
                'id'    => '18',
                'title' => 'audit_log_access',
            ],
            [
                'id'    => '19',
                'title' => 'user_alert_create',
            ],
            [
                'id'    => '20',
                'title' => 'user_alert_show',
            ],
            [
                'id'    => '21',
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => '22',
                'title' => 'user_alert_access',
            ],
            [
                'id'    => '23',
                'title' => 'jurusan_access',
            ],
            [
                'id'    => '24',
                'title' => 'prodi_create',
            ],
            [
                'id'    => '25',
                'title' => 'prodi_edit',
            ],
            [
                'id'    => '26',
                'title' => 'prodi_show',
            ],
            [
                'id'    => '27',
                'title' => 'prodi_delete',
            ],
            [
                'id'    => '28',
                'title' => 'prodi_access',
            ],
            [
                'id'    => '29',
                'title' => 'prodi_jurusan_create',
            ],
            [
                'id'    => '30',
                'title' => 'prodi_jurusan_edit',
            ],
            [
                'id'    => '31',
                'title' => 'prodi_jurusan_show',
            ],
            [
                'id'    => '32',
                'title' => 'prodi_jurusan_delete',
            ],
            [
                'id'    => '33',
                'title' => 'prodi_jurusan_access',
            ],
            [
                'id'    => '34',
                'title' => 'category_create',
            ],
            [
                'id'    => '35',
                'title' => 'category_edit',
            ],
            [
                'id'    => '36',
                'title' => 'category_show',
            ],
            [
                'id'    => '37',
                'title' => 'category_delete',
            ],
            [
                'id'    => '38',
                'title' => 'category_access',
            ],
            [
                'id'    => '39',
                'title' => 'candidate_create',
            ],
            [
                'id'    => '40',
                'title' => 'candidate_edit',
            ],
            [
                'id'    => '41',
                'title' => 'candidate_show',
            ],
            [
                'id'    => '42',
                'title' => 'candidate_delete',
            ],
            [
                'id'    => '43',
                'title' => 'candidate_access',
            ],
            [
                'id'    => '44',
                'title' => 'data_pemilihan_create',
            ],
            [
                'id'    => '45',
                'title' => 'data_pemilihan_edit',
            ],
            [
                'id'    => '46',
                'title' => 'data_pemilihan_show',
            ],
            [
                'id'    => '47',
                'title' => 'data_pemilihan_delete',
            ],
            [
                'id'    => '48',
                'title' => 'data_pemilihan_access',
            ],
            [
                'id'    => '49',
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}