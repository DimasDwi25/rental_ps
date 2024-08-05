<?php
namespace App\Controllers;
use App\Models\ConsoleType;

class ConsoleTypeController extends BaseController
{

    public function index()
    {
        $model = new ConsoleType();
        $consoleTypes = $model->findAll();

        $data = [
            'content' => view('console-type/index', ['consoleTypes' => $consoleTypes]),
        ];

        return view('layouts', $data);
    }

    public function create()
    {
        
        $data = [
            'content' => view('console-type/create')
        ];
        return view('layouts', $data);
    }

    public function store()
    {
        $this->validate([
            'model' => 'required|string|max_length[255]',
            'model' => 'required|string|max_length[1000]',
            'price' => 'required|numeric',
            'image' => [
                'rules' => 'uploaded[image]|is_image[image]|mime_in[image,image/jpeg,image/png,image/jpg,image/gif]|max_size[image,2048]',
                'errors' => [
                    'uploaded' => 'Please choose a file.',
                    'is_image' => 'The file must be an image.',
                    'mime_in' => 'The file type is not allowed.',
                    'max_size' => 'The file size is too large.'
                ]
            ]
        ]);

        $file = $this->request->getFile('image');
        $fileName = time() . '.' . $file->getClientExtension();
        $file->move('uploads', $fileName);

        $model = new ConsoleType();
        $model->save([
            'model' => $this->request->getPost('model'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'image' => $fileName,
        ]);
        return redirect()->to('/console-type')->with('success', 'Console created successfully.');
    }

    public function edit($id)
    {
        $model = new ConsoleType();
        $consoleType = $model->find($id);

        $data = [
            'content' => view('console-type/edit', ['consoleTypes' => $consoleType]),
        ];

        return view('layouts', $data);
    }

    public function update($id)
    {
        $model = new ConsoleType();

        // Validasi input
        $this->validate([
            'model' => 'required|string|max_length[255]',
            'description' => 'required|string|max_length[1000]',
            'price' => 'required|numeric',
            'image' => [
                'rules' => 'permit_empty|uploaded[image]|is_image[image]|mime_in[image,image/jpeg,image/png,image/jpg,image/gif]|max_size[image,2048]',
                'errors' => [
                    'uploaded' => 'Please choose a file.',
                    'is_image' => 'The file must be an image.',
                    'mime_in' => 'The file type is not allowed.',
                    'max_size' => 'The file size is too large.'
                ]
            ]
        ]);

        // Ambil data dari form
        $data = [
            'model' => $this->request->getPost('model'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
        ];

        // Jika ada file gambar baru, proses unggahnya
        $file = $this->request->getFile('image');
        if ($file && $file->isValid()) {
            $fileName = time() . '.' . $file->getClientExtension();
            $file->move('uploads', $fileName);

            // Hapus gambar lama jika ada
            $existingImage = $model->find($id)['image'];
            if ($existingImage) {
                unlink('uploads/' . $existingImage);
            }

            $data['image'] = $fileName;
        }

        // Perbarui data
        $model->update($id, $data);

        return redirect()->to('/console-type')->with('success', 'Console updated successfully.');
    }

    public function delete($id)
    {
        $model = new ConsoleType();

        // Temukan data consoleType yang akan dihapus
        $consoleType = $model->find($id);

        if (!$consoleType) {
            return redirect()->to('/console-type')->with('error', 'Console not found.');
        }

        // Hapus gambar yang ada jika ada
        if ($consoleType['image']) {
            unlink('uploads/' . $consoleType['image']);
        }

        // Hapus data dari database
        $model->delete($id);

        return redirect()->to('/console-type')->with('success', 'Console deleted successfully.');
    }
}