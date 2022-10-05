<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Role::create([
            'guard_name' => 'web',
            'name' => 'rt',
        ]);
        Role::create([
            'guard_name' => 'web',
            'name' => 'user',
        ]);

        Role::create([
            'guard_name' => 'web',
            'name' => 'rw',
        ]);

        // // bikin user
        // $user = \App\Models\User::create([
        //     'email' => 'user1@gmail.com',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email_verified_at' => now(),
        //     'remember_token' => Str::random(10),
        // ]);
        // $user->personal()->create([
        //     'nama' => 'User 1',
        //     'jk' => 'Laki-Laki',
        //     'agama' => 'Islam',
        //     'noktp' => '3172020101980001',
        //     'tempatlahir' => 'Bogor',
        //     'tgllahir' => '2000-01-01',
        //     'status' => 'Belum Menikah',
        //     'pekerjaan' => 'Programmer',
        //     'wilayahrt' => '01',
        //     'nohp' => '089651887984',
        // ]);
        // $user = $user->assignRole(['user']);
        // // batas bikin user

        // // bikin rt
        // $user = \App\Models\User::create([
        //     'email' => 'rt09@gmail.com',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email_verified_at' => now(),
        //     'remember_token' => Str::random(10),
        // ]);
        // $user->personal()->create([
        //     'nama' => 'Suhadi',
        //     'jk' => 'Laki-Laki',
        //     'agama' => 'Islam',
        //     'noktp' => '3172022401890031',
        //     'tempatlahir' => 'Jakarta',
        //     'tgllahir' => '1989-24-01',
        //     'status' => 'Sudah Menikah',
        //     'pekerjaan' => 'Ketua RT 09',
        //     // wilayah rt = 2 digit
        //     'wilayahrt' => '09',
        //     'nohp' => '089651157324',
        // ]);
        // $user = $user->assignRole(['rt']);
        // // batas bikin rt

        // // bikin rw
        // $user = \App\Models\User::create([
        //     'email' => 'rw15@gmail.com',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'email_verified_at' => now(),
        //     'remember_token' => Str::random(10),
        // ]);
        // $user->personal()->create([
        //     'nama' => 'Rasa Nurjamal',
        //     'jk' => 'Laki-Laki',
        //     'agama' => 'Islam',
        //     'noktp' => '3172022401890444',
        //     'tempatlahir' => 'Jakarta',
        //     'tgllahir' => '1989-24-01',
        //     'status' => 'Belum Menikah',
        //     'pekerjaan' => 'Ketua RW 015',
        //     // wilayah rt untuk rw disable
        //     'wilayahrt' => '13',
        //     'nohp' => '089651887984',
        // ]);
        // $user = $user->assignRole(['rw']);
        // // batas bikin rw

        \App\Models\JenisPermohonan::create([
            'jenis_permohonan' => 'Permohonan Penerbitan KK',
            'kode_permohonan' => 'kk',
            'formulir' => ["formulir/draft-kk.pdf"],
        ]);
        \App\Models\JenisPermohonan::create([
            'jenis_permohonan' => 'Permohonan Penerbitan KTP',
            'kode_permohonan' => 'ktp',
        ]);
        \App\Models\JenisPermohonan::create([
            'jenis_permohonan' => 'Permohonan Pengajuan KJP',
            'kode_permohonan' => 'kjp',
            'formulir' => ["formulir/formulir-SKTM.pdf"],
        ]);
        \App\Models\JenisPermohonan::create([
            'jenis_permohonan' => 'Permohonan Pengajuan SKTM',
            'kode_permohonan' => 'sktm',
            'formulir' => ["formulir/formulir-SKTM.pdf"],
        ]);
        \App\Models\JenisPermohonan::create([
            'jenis_permohonan' => 'Permohonan Pindah Keluar',
            'kode_permohonan' => 'pk',
        ]);
        \App\Models\JenisPermohonan::create([
            'jenis_permohonan' => 'Permohonan Pindah Datang',
            'kode_permohonan' => 'pd',
            'formulir' => ["formulir/formulir-penjamin(pindah-datang).pdf", "formulir/draft-kk.pdf"],
        ]);
        \App\Models\JenisPermohonan::create([
            'jenis_permohonan' => 'Permohonan Pengajuan Usaha Mikro',
            'kode_permohonan' => 'um',
        ]);
    }
}
