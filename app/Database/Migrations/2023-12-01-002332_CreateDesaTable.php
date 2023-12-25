<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDesaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'kode_pos' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
                'null' => true,
            ],
            'kode_wilayah' => [
                'type' => 'VARCHAR',
                'constraint' => '16',
                'null' => true,
            ],
            'id_kecamatan' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_kecamatan', 'kecamatan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('desa');
    }

    public function down()
    {
        $this->forge->dropTable('desa');
    }
}
