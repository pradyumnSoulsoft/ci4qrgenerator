<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Stocksmaster extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => '11',
                'unique' => true,
                'auto_increment' => true,
            ],
            'cylinder_id' => [
                'type' => 'INT',
                'constraint' => '11',
            ],
            'barcode' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'qr_code' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'qty' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'stock_type' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'stock_location' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
                               
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('stocks');
    }

    public function down()
    {
        $this->forge->dropTable('stocks');
    }
}
