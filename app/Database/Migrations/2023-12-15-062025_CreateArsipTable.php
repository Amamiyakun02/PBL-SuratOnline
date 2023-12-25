<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateArsipTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_surat' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'path_kop_surat' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'content_surat' => [
                'type' => 'TEXT',
            ],
            'id_desa' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_desa', 'desa', 'id'); // Sesuaikan dengan nama tabel dan kolom yang benar

        $this->forge->createTable('arsip');
    }

    public function down()
    {
        $this->forge->dropTable('arsip');
    }
}
