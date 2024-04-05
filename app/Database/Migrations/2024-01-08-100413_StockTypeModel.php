<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StockTypeModel extends Migration
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
            'stock_type_master' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            
                   
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('stock_type_master');
    }

    public function down()
    {
        $this->forge->dropTable('stock_type_master');
    }
}
