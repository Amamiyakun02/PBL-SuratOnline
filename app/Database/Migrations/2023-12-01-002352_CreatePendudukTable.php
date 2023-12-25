<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePendudukTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'NIK' => [
                'type' => 'VARCHAR',
                'constraint' => 16,
                'unique' => true,
            ],
            'Nama' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'tempat_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'nomor_hp' => [
                'type' =>'VARCHAR',
                'constraint' => 15,
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
            ],
            'jenis_kelamin' => [
                'type' => 'BOOLEAN',
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'RT' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'RW' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'id_desa' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'agama' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'status_perkawinan' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'pekerjaan' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'kewarganegaraan' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
        ]);

        // Menetapkan primary key
        $this->forge->addPrimaryKey('id');

        // Menetapkan foreign key ke tabel desa
        $this->forge->addForeignKey('id_desa', 'desa', 'id');

        // Membuat tabel
        $this->forge->createTable('penduduk', true);
    }

    public function down()
    {
        $this->forge->dropTable('penduduk');
    }
}
