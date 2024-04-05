<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class GasCylinderMaster extends Migration
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
            'cylinder_no' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'barcode' => [
                'type' => 'TEXT',
                
            ],
            'manufacturer_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                
            ],
            'manufacturer_no' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                
            ],
            'cylinder_gas_filling_size' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                
            ],
            'cylinder_height' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                
            ],
            'gasId' => [
                'type' => 'INT',
                'constraint' => '11',
                'null' => true,
                
            ],
            'cylinder_status' => [
                'type' => 'TINYINT',
                'constraint' => '1',
                
            ],
            'status' => [
                'type' => 'TINYINT',
                'constraint' => '1',
                
            ],
                   
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('gas_cylinder_master');
    }

    public function down()
    {
        $this->forge->dropTable('gas_cylinder_master');
    }
}
