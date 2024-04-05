<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RenameColumnInGasModel extends Migration
{
    public function up()
    {
        $this->forge->modifyColumn('gas_master', [
            'gar_formula' => [
                'name' => 'gas_formula',
                'type' => 'VARCHAR',
                'constraint' => '255',
                
            ],
            
        ]);
        
    }

    public function down()
    {
        //
    }
}
