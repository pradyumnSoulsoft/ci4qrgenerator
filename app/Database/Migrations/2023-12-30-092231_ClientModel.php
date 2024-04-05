<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ClientModel extends Migration
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
            'client_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'address' => [
                'type' => 'TEXT',
            ],
            'contact' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'idealtimeforcylinder' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            
                   
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('client_master');
    }

    public function down()
    {
        $this->forge->dropTable('client_master');
    }
}
/*
id
client_name
address
contact
email
idealtimeforcylinder
*/