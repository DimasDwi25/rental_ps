<?php 
namespace App\Models;

use CodeIgniter\Model;

class Console extends Model
{
    protected $table = 'consoles';
    protected $primaryKey = 'id';

    protected $allowedFields = ['console_type_id', 'serial_number', 'status'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    
    // Menambahkan relasi dengan ConsoleTypes
    public function getAllConsoles()
    {
        return $this->select('consoles.*, console_types.model as console_type_name, console_types.image as console_types_image')
                    ->join('console_types', 'consoles.console_type_id = console_types.id')
                    ->findAll();
    }

    //menghitung jumlah console
    public function countByType()
    {
        return $this->select('console_type_id, COUNT(*) as count')
                    ->join('console_types', 'consoles.console_type_id = console_types.id')
                    ->groupBy('console_type_id')
                    ->findAll();
    }
}
