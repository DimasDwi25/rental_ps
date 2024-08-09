<?php

namespace App\Models;

use CodeIgniter\Model;
use DateTime;
use App\Models\RentalItem;
use App\Models\Console;
use App\Models\ConsoleType;
use DateInterval;

class Rental extends Model
{
    protected $table = 'rentals';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'customer_name',
        'email',
        'no_telp',
        'alamat',
        'rental_date',
        'return_date',
        'status',
        'total_price',
        'console_id'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getAllConsoles()
    {
        return $this->select('rentals.*, consoles.serial_number as console_name, console_types.model as console_type_name')
                    ->join('consoles', 'rentals.console_id = consoles.id')
                    ->join('console_types', 'consoles.console_type_id = console_types.id')
                    ->findAll();
    }

    public function countRental()
    {
        // Menghitung rental yang sedang dipinjam
        return $this->where('status', 'dipinjam')
                    ->countAllResults();
    }
    
    public function calculateTotalIncome()
    {
        // Menghitung total penghasilan dari rental yang telah selesai
        return $this->selectSum('total_price', 'total_income')
                    ->where('status', 'selesai') // Status untuk rental yang telah selesai
                    ->first();
    }

    public function getRecentCompletedRentals($limit = 5)
    {
        return $this->select('rentals.*, consoles.serial_number as console_name, console_types.model as console_type_name')
                    ->join('consoles', 'rentals.console_id = consoles.id')
                    ->join('console_types', 'consoles.console_type_id = console_types.id')
                    ->where('rentals.status', 'selesai')
                    ->orderBy('rentals.return_date', 'DESC')
                    ->findAll($limit);
    }
}
