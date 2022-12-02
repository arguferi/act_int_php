<?php

namespace App\Controllers;

class Administrator extends BaseController
{
    public function index()
    {
        $this->_loadDefaultView([], 'index');
    }

    private function _loadDefaultView($data, $view)
    {

        $session = session();
        $dataHeader = ['session' => $session];

        echo view('administrator/templates/header', $dataHeader);
        echo view("administrator/$view", $data);
        echo view('administrator/templates/footer');
    }
}
