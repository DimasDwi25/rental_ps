<?php 
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'password' => password_hash('12345678', PASSWORD_DEFAULT), // hashed password
                'email' => 'admin@admin.com'
            ],
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
