<?php

namespace App\Controllers;

use App\Models\Rental;
use App\Models\Console;
use App\Models\ConsoleType;
use Date;

class RentalController extends BaseController
{
    public function index()
    {
        $rentalModel = new Rental();

        $rentals = $rentalModel->getAllConsoles();
        
        $data = [
            'content' => view('rental/index', ['rentals' => $rentals]),
        ];

        return view('layouts', $data);
    }

    public function create()
    {
        $consoleModel = new Console();
        $consoles = $consoleModel->where('status', 'ready')->getAllConsoles();
        $data = [
            'content' => view('rental/create', ['consoles' => $consoles]),
        ];
        
        return view('layouts', $data);
    }

    public function store()
    {
        $rentalModel = new Rental();
        $consoleModel = new Console();
        $consoleTypeModel = new ConsoleType();

        // Ambil data dari form
        $data = [
            'customer_name' => $this->request->getPost('customer_name'),
            'email' => $this->request->getPost('email'),
            'no_telp' => $this->request->getPost('no_telp'),
            'alamat' => $this->request->getPost('alamat'),
            'rental_date' => $this->request->getPost('rental_date'),
            'return_date' => $this->request->getPost('return_date'),
            'console_id' => $this->request->getPost('console_id'),
            'status' => 'dipinjam',
        ];

        // Simpan data rental
        $rentalId = $rentalModel->insert($data);

        // Ambil console_ids dari form
        $consoleIds = $this->request->getPost('console_id');

        // Hitung dan simpan data rental items
        $totalCost = 0;
        $rentalStart = new \DateTime($data['rental_date']);
        $rentalEnd = new \DateTime($data['return_date']);
        $interval = $rentalStart->diff($rentalEnd);
        $daysRented = $interval->days;

        foreach ($consoleIds as $consoleId) {
            // Ambil harga sewa per hari dari database
            $console = $consoleModel->find($consoleId);
            $consoleType = $consoleTypeModel->find($console['console_type_id']);
            $rentalPricePerDay = $consoleType['price'];

            // Hitung harga sewa
            $rentalPrice = $rentalPricePerDay * $daysRented;
            $totalCost += $rentalPrice;

            // Update status console menjadi 'dipinjam'
            $consoleModel->update($consoleId, ['status' => 'dipinjam']);
        }

        // Simpan total biaya sewa pada tabel rentals
        $rentalModel->update($rentalId, ['total_price' => $totalCost]);

        return redirect()->to('/rentals')->with('success', 'Rental created successfully. Total cost: ' . $totalCost);
    }


    // public function edit($id)
    // {
    //     $rentalModel = new RentalModel();
    //     $rentalItemModel = new RentalItemModel();
    //     $consoleModel = new ConsoleModel();

    //     $data['rental'] = $rentalModel->find($id);
    //     $data['rental_items'] = $rentalItemModel->where('rental_id', $id)->findAll();
    //     $data['consoles'] = $consoleModel->findAll();

    //     if (!$data['rental']) {
    //         return redirect()->to('/rentals')->with('error', 'Rental tidak ditemukan');
    //     }

    //     $data['content'] = view('rental/edit', $data);
    //     return view('layouts', $data);
    // }

    // public function update($id)
    // {
    //     $rentalModel = new RentalModel();
    //     $rentalItemModel = new RentalItemModel();

    //     $rentalData = [
    //         'customer_name' => $this->request->getPost('customer_name'),
    //         'email' => $this->request->getPost('email'),
    //         'no_telp' => $this->request->getPost('no_telp'),
    //         'alamat' => $this->request->getPost('alamat'),
    //         'rental_date' => $this->request->getPost('rental_date'),
    //         'return_date' => $this->request->getPost('return_date'),
    //         'status' => $this->request->getPost('status'),
    //     ];

    //     $rentalModel->update($id, $rentalData);

    //     // Update Rental Items
    //     $consoleIds = $this->request->getPost('console_ids');
    //     $rentalPrices = $this->request->getPost('rental_prices');
    //     $rentalItemIds = $this->request->getPost('rental_item_ids');

    //     foreach ($consoleIds as $index => $consoleId) {
    //         $rentalItemData = [
    //             'console_id' => $consoleId,
    //             'rental_price' => $rentalPrices[$index],
    //             'status' => 'Pending'
    //         ];

    //         if (isset($rentalItemIds[$index])) {
    //             $rentalItemModel->update($rentalItemIds[$index], $rentalItemData);
    //         } else {
    //             $rentalItemData['rental_id'] = $id;
    //             $rentalItemModel->insert($rentalItemData);
    //         }
    //     }

    //     return redirect()->to('/rentals')->with('message', 'Rental updated successfully');
    // }

    public function delete($id)
    {
        $rentalModel = new Rental();
        
        $rentalModel->delete($id);

        return redirect()->to('/rentals')->with('message', 'Rental deleted successfully');
    }

    public function dipinjam()
    {
        $rentalModel = new Rental();
        $rentals = $rentalModel->where('rentals.status', 'dipinjam')->getAllConsoles();
        $data = [
            'content' => view('rental/dipinjam', ['rentals' => $rentals]),
        ];
        return view('layouts', $data);
    }

    public function selesai()
    {
        $rentalModel = new Rental();
        $rentals = $rentalModel->where('rentals.status', 'selesai')->getAllConsoles();
        $data = [
            'content' => view('rental/selesai', ['rentals' => $rentals]),
        ];
        return view('layouts', $data);
    }

    public function dibatalkan()
    {
        $rentalModel = new Rental();
        $rentals = $rentalModel->where('rentals.status', 'dibatalkan')->getAllConsoles();
        $data = [
            'content' => view('rental/dibatalkan', ['rentals' => $rentals]),
        ];
        return view('layouts', $data);
    }

    public function updateStatus($id, $newStatus)
    {
        $rentalModel = new Rental();
        
        // Validasi status baru
        $validStatuses = ['dipinjam', 'selesai', 'dibatalkan'];
        if (!in_array($newStatus, $validStatuses)) {
            return redirect()->to('/transaksi/dipinjam')->with('error', 'Status tidak valid');
        }

        // Update status rental
        $rentalModel->update($id, ['status' => $newStatus]);

        return redirect()->to('/transaksi/dipinjam')->with('success', 'Status rental berhasil diperbarui');
    }
}
