<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Console;
use App\Models\Rental;

class DashboardController extends Controller
{
    public function index(): string
    {
        $model = new Console();
        $modelRental = new Rental();

        $recentCompletedRentals = $modelRental->getRecentCompletedRentals();
        // Hitung rental yang sedang dipinjam
        $countRentals = $modelRental->countRental();

        //hitung total penghasilan
        $totalCost = $modelRental->calculateTotalIncome();
        
         // Ambil semua konsol
         $allConsoles = $model->getAllConsoles();
        
         // Ambil jumlah konsol berdasarkan tipe
         $consolesByType = $model->countByType();
        
         
         $data = [
             'content' => view('dashboard/index', [
                 'allConsoles' => $allConsoles,
                 'consolesByType' => $consolesByType,
                 'countRentals' => $countRentals,
                 'totalCost' => $totalCost['total_income'] ?? 0,
                 'recentCompletedRentals' => $recentCompletedRentals
             ]),
         ];

        return view('layouts', $data);
    }
}