<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'nama' => 'Tambang Ulang',
                'kode_pos' => '70854',
                'kode_wilayah' => '63.01.08'

            ],
            [
                'id' => 2,
                'nama' => 'Pelaihari',
                'kode_pos' => '70812',
                'kode_wilayah' => '63.01.03'
            ],
            [
                'id' => 3,
                'nama' => 'Bajuin',
                'kode_pos' => '70815',
                'kode_wilayah' => '63.01.10'
            ]
        ];

        foreach ($data as $row) {
            $this->db->table('kecamatan')->insert($row);
        }
    }
}
