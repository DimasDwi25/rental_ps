<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Console;

class DashboardController extends Controller
{
    public function index(): string
    {
        $model = new Console();
        
         // Ambil semua konsol
         $allConsoles = $model->getAllConsoles();
        
         // Ambil jumlah konsol berdasarkan tipe
         $consolesByType = $model->countByType();
         
         $data = [
             'content' => view('dashboard/index', [
                 'allConsoles' => $allConsoles,
                 'consolesByType' => $consolesByType
             ]),
         ];

        return view('layouts', $data);
    }
}