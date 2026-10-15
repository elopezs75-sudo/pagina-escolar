<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTimestampsToTareas extends Migration
{
    public function up()
    {
        $this->forge->addColumn('tareas', [
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
                'default' => null
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
                'default' => null
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('tareas', 'updated_at');
        $this->forge->dropColumn('tareas', 'created_at');
    }
}
