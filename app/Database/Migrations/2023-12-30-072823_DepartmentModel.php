<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DepartmentModel extends Migration
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
            'dept_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'description' => [
                'type' => 'TEXT',
            ],
                   
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('department_master');
    }

    public function down()
    {
        $this->forge->dropTable('department_master');
    }
}
