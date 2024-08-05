<?php

namespace App\Controllers;
use App\Models\Console;
use App\Models\ConsoleType;

class ConsoleController extends BaseController
{
    public function index()
    {
        $model = new Console();
        $data = [
            'content' => view('console/index', ['consoles' => $model->getAllConsoles()]),
        ];

        return view('layouts', $data);
    }

    public function create()
    {
        $model = new ConsoleType();
        $consoleTypes = $model->findAll();
        $statusOptions = [
            'ready' => 'Ready',
            'maintenance' => 'Maintenance',
            'sedang dipinjam' => 'Sedang dipinjam',
        ];

        $data = [
            'consoleTypes' => $consoleTypes,
            'statusOptions' => $statusOptions,
        ];

        // Menggunakan method view() untuk menggabungkan semua data ke dalam satu array
        $data['content'] = view('console/create', $data);

        return view('layouts', $data);
    }

    public function store()
    {
        $model = new Console();

        $this->validate([
            'console_type_id' => 'required|integer',
            'serial_number' => 'required|string|max_length[255]',
            'status' => 'required|string|max_length[50]',
        ]);

        $model->save([
            'console_type_id' => $this->request->getPost('console_type_id'),
            'serial_number' => $this->request->getPost('serial_number'),
            'status' => $this->request->getPost('status'),
        ]);

        return redirect()->to('/console')->with('success', 'Console created successfully.');
    }

    public function edit($id)
    {
        $model = new Console();
        $console = $model->find($id);

        if (!$console) {
            return redirect()->to('/console')->with('error', 'Console not found.');
        }

        $consoleTypeModel = new ConsoleType();
        $consoleTypes = $consoleTypeModel->findAll();

        $statusOptions = [
            'ready' => 'Ready',
            'maintenance' => 'Maintenance',
            'sedang dipinjam' => 'Sedang dipinjam',
        ];

        // Pass all data in a single array
        $data = [
            'console' => $console,
            'consoleTypes' => $consoleTypes,
            'content' => view('console/edit', [
                'console' => $console,
                'consoleTypes' => $consoleTypes,
                'statusOptions' => $statusOptions
            ]),
        ];

        return view('layouts', $data);
    }


    public function update($id)
    {
        $model = new Console();

        $this->validate([
            'console_type_id' => 'required|integer',
            'serial_number' => 'required|string|max_length[255]',
            'status' => 'required|string|max_length[50]',
        ]);

        $model->update($id, [
            'console_type_id' => $this->request->getPost('console_type_id'),
            'serial_number' => $this->request->getPost('serial_number'),
            'status' => $this->request->getPost('status'),
        ]);

        return redirect()->to('/console')->with('success', 'Console updated successfully.');
    }

    public function delete($id)
    {
        $model = new Console();
        $model->delete($id);

        return redirect()->to('/console')->with('success', 'Console deleted successfully.');
    }
}
