<?php 

namespace App\Controllers;

use App\Models\User;

class UserController extends BaseController
{
    public function index()
    {
        $model = new User();
        $users = $model->findAll();
        $data = [
            'content' => view('users/index', ['users' => $users]),
        ];
        return view('layouts', $data);
    }

    public function create()
    {
        $data = [
            'content' => view('users/create'),
        ];
        return view('layouts',$data);
    }

    public function store()
    {
        $model = new User();
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];
        $model->save($data);
        return redirect()->to('/users');
    }

    public function edit($id)
    {
        $model = new User();
        $users = $model->find($id);
        $data= [
            'content' => view('users/edit', ['users' => $users]),
        ];
        return view('layouts', $data);
    }

    public function update($id)
    {
        $model = new User();
        
        // Get the post data
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];
    
        // Update the user with the given ID
        $model->update($id, $data);
    
        return redirect()->to('/users');
    }    

    public function delete($id)
    {
        $model = new User();
        $model->delete($id);
        return redirect()->to('/users');
    }
}
