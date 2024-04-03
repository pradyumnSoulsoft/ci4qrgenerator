<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class GasModel extends Migration
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
            'gas_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'gar_formula' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'status' => [
                'type' => 'TINYINT',
                'constraint' => '1',
                
            ],
                   
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('gas_master');
    }

    public function down()
    {
        $this->forge->dropTable('gas_master');
    }
}
