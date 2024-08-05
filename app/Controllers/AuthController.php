<?php 
namespace App\Controllers;

use App\Models\User;

class AuthController extends BaseController
{
    public function login()
    {
        $data = [
            'error' => session()->getFlashdata('error')
        ];

        return view('auth/login', $data);
    }

    public function doLogin()
    {
        $model = new User();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');


        $user = $model->verifyUser($email, $password);

        $session = session();
        log_message('debug', 'Session data: ' . print_r($session->get(), true));

        if ($user) {
            $session = session();
            $session->set([
                'id' => $user['id'],
                'email' => $user['email'],
                'username' => $user['username'],
                'logged_in' => true,
            ]);
            return redirect()->to('/dashboard');
        } else {
            session()->setFlashdata('error', 'Invalid login credentials');
            return redirect()->to('/')->with('error', 'Invalid login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
