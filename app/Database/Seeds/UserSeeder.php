<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'username' => 'maireza',
                'email' => 'maireza@gmail.com',
                'nomor_telpon' => '084727558237',
                'password' => hash('sha256', 'maireza'),
                'role' => 'admin',
                'id_desa' => 1
            ],
            [
                'id' => 2,
                'username' => 'aries',
                'email' => 'aries@gmail.com',
                'nomor_telpon' => '084727596236',
                'password' => hash('sha256', 'aries'),
                'role' => 'admin-desa',
                'id_desa' => 2
            ],
            [
                'id' => 3,
                'username' => 'fadhil',
                'email' => 'fadhil@gmail.com',
                'nomor_telpon' => '084727595724',
                'password' => hash('sha256', 'fadhil'),
                'role' => 'admin-desa',
                'id_desa' => 1
            ],
            [
                'id' => 4,
                'username' => 'Desfalda',
                'email' => 'desfalda@gmail.com',
                'nomor_telpon' => '08472759369',
                'password' => hash('sha256', 'desfalda'),
                'role' => 'admin-desa',
                'id_desa' => 3
            ],
        ];
        
        foreach ($data as $row) {
            $this->db->table('users')->insert($row);
        }
    }
}
