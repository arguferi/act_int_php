<?php

namespace App\Controllers;

use App\Models\UserModel;
use \CodeIgniter\Exceptions\PageNotFoundException;


class User extends BaseController
{

    public function index()
    {
        $user = new UserModel();
        $session = session();

        if ($session->type == 'it') {
            $data = [
                'users' => $user->asObject()->withDeleted()->paginate(10),
                'pager' => $user->pager,
                'session' => $session
            ];
        } elseif ($session->type === 'superuser') {
            $data = [
                'users' => $user->asObject()->paginate(10),
                'pager' => $user->pager,
                'session' => $session
            ];
        } elseif ($session->type == 'user') {
            $data = [
                'users' => $user->asObject()->paginate(10),
                'pager' => $user->pager,
                'session' => $session
            ];
        }


        $this->_loadDefaultView($data, 'index');
    }

    public function new()
    {
        $this->_loadDefaultView([], 'new');
    }

    public function create()
    {
        helper('user');
        $user = new UserModel();
        $password = hashPassword($this->request->getPost('password'));

        if ($this->validate('user')) {
            $id = $user->insert([
                'username' => $this->request->getPost('username'),
                'password' => $password,
                'type' => $this->request->getPost('type')
            ]);
            return redirect()->to('/administrator/user/new')->with('message', 'User Succesfully Created 👤');
        } else return redirect()->back()->withInput();
    }

    public function edit($id = null)
    {
        $user = new UserModel();
        if ($user->find($id) == null) {
            throw PageNotFoundException::forPageNotFound();
        }


        $this->_loadDefaultView(['user' => $user->asObject()->find($id)], 'edit');
    }

    public function update($id = null)
    {
        helper('user');
        $user = new UserModel();

        if ($user->find($id) == null) {
            throw PageNotFoundException::forPageNotFound();
        }

        if (empty($this->request->getPost('password'))) {

            $user->update($id, [
                'type' => $this->request->getPost('type')
            ]);
            return redirect()->to("/administrator/user/$id/edit")->with('message', 'User Type Edited Succesfully');
        } elseif ($this->request->getPost('password')) {
            $password = hashPassword($this->request->getPost('password'));
            $user->update($id, [
                'type' => $this->request->getPost('type'),
                'password' => $password
            ]);
            return redirect()->to("/administrator/user/$id/edit")->with('message', 'User Type and Password Edited Succesfully');
        }
        return redirect()->back()->withInput();
    }

    public function delete($id = null)
    {
        $user = new UserModel();
        if ($user->find($id) == null) {
            throw PageNotFoundException::forPageNotFound();
        }
        $user->delete($id);
        return redirect()->to('/administrator/user');
    }

    public function undelete($id = null)
    {
        $user = new UserModel();


        // if ($user->find($id) == null) {
        //     throw PageNotFoundException::forPageNotFound();
        // }

        if ($this->request->getPost()) {
            $user->update($id, [
                'deleted_at' => null
            ]);
            return redirect()->to("/administrator/user/$id/edit")->with('message', 'User succesfully restored');
        }
        return redirect()->back();
    }


    public function search()
    {
        $user = new UserModel();
        $search = $this->request->getPost('search');


        $data = [
            'users' => $user->asObject()->like('username', $search)->orLike('id', $search)->paginate(10),
            'pager' => $user->pager
        ];

        $this->_loadDefaultView($data, 'search');
    }



    private function _loadDefaultView($data, $view)
    {
        $session = session();
        $dataHeader = ['session' => $session];

        echo view('administrator/templates/header', $dataHeader);
        echo view("administrator/user/$view", $data);
        echo view('administrator/templates/footer');
    }
}
