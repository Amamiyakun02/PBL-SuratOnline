<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKecamatanTable extends Migration
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
                'constraint' => '10',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('kecamatan');

    }

    public function down()
    {
        $this->forge->dropTable('kecamatan');
    }
}
