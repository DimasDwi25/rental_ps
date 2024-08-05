<?php 
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateConsolesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'console_type_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'serial_number' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'unique' => true,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('console_type_id', 'console_types', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('consoles');
    }

    public function down()
    {
        $this->forge->dropTable('consoles');
    }
}
