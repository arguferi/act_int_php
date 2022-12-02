<?php

namespace App\Controllers;

use App\Models\UserModel;

class Credentials extends BaseController
{
    public function login()
    {
        echo view("administrator/login");
        return $this->_redirectAuth();
    }



    public function loginPost()
    {

        helper('user');
        $userModel = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->select('id,username,password,type')->where('username', $username)->first();

        if (!$user) {
            return redirect()->back()->with('login', 'User or Password not found');
        }

        if (verifyPassword($password, $user['password'])) {
            unset($user['password']);
            $session = session();
            $session->set($user);

            return $this->_redirectAuth();
        }

        return redirect()->back()->with('login', 'User or Password not found');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }

    private function _redirectAuth()
    {
        $session = session();
        if ($session->type == 'user') {
            return redirect()->to('/administrator/index')->with('message', 'Hello ' . $session->username);
        } elseif ($session->type == 'it') {
            return redirect()->to('/administrator/user')->with('message', 'Hello ' . $session->username);
        } elseif ($session->type == 'superuser') {
            return redirect()->to('/administrator/user')->with('message', 'Hello ' . $session->username);
        }
    }


    private function _loadDefaultView($data, $view)
    {
        echo view('administrator/templates/header');
        echo view("administrator/$view", $data);
        echo view('administrator/templates/footer');
    }
}
