<?php

namespace App\Controllers;

use App\Models\UserModel;

class Dashboard extends BaseController
{



    public function index()
    {
        $usersModel = new \App\Models\UserModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $usersModel->find($loggedUserID);


        $data = [
            'title' => 'Dashboard',
            'userInfo' => $userInfo,

        ];
        return view('dashboard/index', $data);
    }
}