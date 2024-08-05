<?php 
namespace App\Models;

use CodeIgniter\Model;

class ConsoleType extends Model
{
    protected $table = 'console_types';
    protected $primaryKey = 'id';

    protected $allowedFields = ['model', 'description', 'image', 'price'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

}
