<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DesaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'nama' => 'Tambang Ulang',
                'kode_pos' => '70854',
                'kode_wilayah' => '63.01.08',
                'id_kecamatan' => 1
            ],
            [
                'id' => 2,
                'nama' => 'Sungai Jelai',
                'kode_pos' => '70854',
                'kode_wilayah' => '63.01.03',
                'id_kecamatan' => 1
            ],
            [
                'id' => 3,
                'nama' => 'Gunung Raja',
                'kode_pos' => '70854',
                'kode_wilayah' => '63.01.10',
                'id_kecamatan' => 1
            ],
            [
                'id' => 4,
                'nama' => 'Pulau Sari',
                'kode_pos' => '70854',
                'kode_wilayah' => '63.01.10',
                'id_kecamatan' => 1
            ],
            [
                'id' => 5,
                'nama' => 'Martadah',
                'kode_pos' => '70854',
                'kode_wilayah' => '63.01.10',
                'id_kecamatan' => 1
            ],
            [
                'id' => 6,
                'nama' => 'Sungai Pinang',
                'kode_pos' => '70854',
                'kode_wilayah' => '63.01.10',
                'id_kecamatan' => 1
            ],
            [
                'id' => 7,
                'nama' => 'Pelaihari',
                'kode_pos' => '70854',
                'kode_wilayah' => '63.01.10',
                'id_kecamatan' => 2
            ],
            [
                'id' => 8,
                'nama' => 'Sarang Halang',
                'kode_pos' => '70854',
                'kode_wilayah' => '63.01.10',
                'id_kecamatan' => 2
            ],
            [
                'id' => 9,
                'nama' => 'Bumi Jaya',
                'kode_pos' => '70854',
                'kode_wilayah' => '63.01.10',
                'id_kecamatan' => 2
            ],
            [
                'id' => 10,
                'nama' => 'Panggung',
                'kode_pos' => '70854',
                'kode_wilayah' => '63.01.10',
                'id_kecamatan' => 2
            ],
            [
                'id' => 11,
                'nama' => 'Ambungan',
                'kode_pos' => '70854',
                'kode_wilayah' => '63.01.10',
                'id_kecamatan' => 2
            ],
            [
                'id' => 12,
                'nama' => 'Galam',
                'kode_pos' => '70854',
                'kode_wilayah' => '63.01.10',
                'id_kecamatan' => 3
            ],
            [
                'id' => 13,
                'nama' => 'Bajuin',
                'kode_pos' => '70854',
                'kode_wilayah' => '63.01.10',
                'id_kecamatan' => 3
            ],
            [
                'id' => 14,
                'nama' => 'Tirta Jaya',
                'kode_pos' => '70854',
                'kode_wilayah' => '63.01.10',
                'id_kecamatan' => 3
            ],
            [
                'id' => 15,
                'nama' => 'Pemalongan',
                'kode_pos' => '70854',
                'kode_wilayah' => '63.01.10',
                'id_kecamatan' => 3
            ],
        ];

        foreach ($data as $row) {
            $this->db->table('desa')->insert($row);
        }
    }
}
