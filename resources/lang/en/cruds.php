<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission'     => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Title',
            'title_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'role'           => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Title',
            'title_helper'       => '',
            'permissions'        => 'Permissions',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'user'           => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Name',
            'name_helper'              => '',
            'email'                    => 'Email',
            'email_helper'             => '',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => '',
            'password'                 => 'Password',
            'password_helper'          => '',
            'roles'                    => 'Roles',
            'roles_helper'             => '',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
            'nim'                      => 'Nim',
            'nim_helper'               => '',
            'kelas'                    => 'Kelas',
            'kelas_helper'             => '',
        ],
    ],
    'auditLog'       => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => '',
            'description'         => 'Description',
            'description_helper'  => '',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => '',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => '',
            'user_id'             => 'User ID',
            'user_id_helper'      => '',
            'properties'          => 'Properties',
            'properties_helper'   => '',
            'host'                => 'Host',
            'host_helper'         => '',
            'created_at'          => 'Created at',
            'created_at_helper'   => '',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => '',
        ],
    ],
    'userAlert'      => [
        'title'          => 'User Alerts',
        'title_singular' => 'User Alert',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'alert_text'        => 'Alert Text',
            'alert_text_helper' => '',
            'alert_link'        => 'Alert Link',
            'alert_link_helper' => '',
            'user'              => 'Users',
            'user_helper'       => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
        ],
    ],
    'jurusan'        => [
        'title'          => 'Jurusan',
        'title_singular' => 'Jurusan',
    ],
    'prodi'          => [
        'title'          => 'Prodi',
        'title_singular' => 'Prodi',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => '',
            'name'                    => 'Name',
            'name_helper'             => '',
            'description'             => 'Description',
            'description_helper'      => '',
            'jumlah_mahasiswa'        => 'Jumlah Mahasiswa',
            'jumlah_mahasiswa_helper' => '',
            'created_at'              => 'Created at',
            'created_at_helper'       => '',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => '',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => '',
            'jurusan'                 => 'Jurusan',
            'jurusan_helper'          => '',
        ],
    ],
    'prodiJurusan'   => [
        'title'          => 'Prodi Jurusan',
        'title_singular' => 'Prodi Jurusan',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => '',
            'name'                   => 'Name',
            'name_helper'            => '',
            'description'            => 'Description',
            'description_helper'     => '',
            'total_mahasiswa'        => 'Total Mahasiswa',
            'total_mahasiswa_helper' => '',
            'created_at'             => 'Created at',
            'created_at_helper'      => '',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => '',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => '',
        ],
    ],
    'category'       => [
        'title'          => 'Kategori Pemilihan',
        'title_singular' => 'Kategori Pemilihan',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'token'             => 'Token',
            'token_helper'      => '',
            'open_date'         => 'Mulai Pemilihan',
            'open_date_helper'  => '',
            'close_date'        => 'Batas Pemilihan',
            'close_date_helper' => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
            'candidate'         => 'Kandidat',
            'candidate_helper'  => '',
        ],
    ],
    'candidate'      => [
        'title'          => 'Kandidat Pemilihan',
        'title_singular' => 'Kandidat Pemilihan',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => '',
            'name'                => 'Name',
            'name_helper'         => '',
            'organization'        => 'Asal organisasi',
            'organization_helper' => '',
            'visimisi'            => 'Visi dan Misi',
            'visimisi_helper'     => '',
            'photo'               => 'Photo',
            'photo_helper'        => '',
            'link'                => 'Link',
            'link_helper'         => 'social link',
            'created_at'          => 'Created at',
            'created_at_helper'   => '',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => '',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => '',
            'sebagai'             => 'Mencalonkan Sebagai',
            'sebagai_helper'      => '',
            'jurusan'             => 'Jurusan ( SC DPM Di isi DAPIL )',
            'jurusan_helper'      => '',
        ],
    ],
    'dataPemilihan'  => [
        'title'          => 'Data Pemilihan',
        'title_singular' => 'Data Pemilihan',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'user'              => 'User',
            'user_helper'       => '',
            'candidate'         => 'Memilih',
            'candidate_helper'  => '',
            'category'          => 'Kategori Pemilihan',
            'category_helper'   => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'tahapan'        => [
        'title'          => 'Tahapan',
        'title_singular' => 'Tahapan',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => '',
            'tanggal'              => 'Tanggal',
            'tanggal_helper'       => '',
            'description'          => 'Description',
            'description_helper'   => '',
            'jenis_tahapan'        => 'Jenis Tahapan',
            'jenis_tahapan_helper' => '',
            'created_at'           => 'Created at',
            'created_at_helper'    => '',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => '',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => '',
        ],
    ],
];