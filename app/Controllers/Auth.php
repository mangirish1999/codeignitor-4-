<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Libraries\Hash;


class Auth extends Controller
{

    public function __construct()
    {
        helper(['url', 'form']);
    }




    public function index()
    {
        return view('auth/login');
    }
    public function register()
    {
        return view('auth/register');
    }


    public function save()
    {
        // $validation = $this->validate([
        //     'name' => 'required',
        //     'email' => 'required|valid_email|is_unique[users.email]',
        //     'password' => 'required|min_length[5]|max_length[12]',
        //     'cpassword' => 'required|min_length[5]|max_length[12]|matches[password]'


        // ]);

        $validation = $this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your name is required'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'Your name is required',
                    'valid_email' => 'Enter a valid Email',
                    'is_unique' => 'Email already taken '
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[5]|max_length[12]',
                'errors' => [
                    'required' => 'Password is required',
                    'min_length[5]' => 'Password length should be atleast 5 characters',
                    'max_length[12]' => 'Password length should not exceed 12 characters'
                ]
            ],
            'cpassword' => [
                'rules' => 'required|min_length[5]|max_length[12]|matches[password]',
                'errors' => [
                    'required' => 'Confirm Password is required',
                    'matches' => 'Password does  not match',
                    'min_length[5]' => 'Confirm Password length should be atleast 5 characters',
                    'max_length[12]' => ' Confirm Password length should not exceed 12 characters'
                ]
            ],

        ]);
        if (!$validation) {
            return view('auth/register', ['validation' => $this->validator]);
        } else {
            //lets register user in db
            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $values = [
                'name' => $name,
                'email' => $email,
                'password' => hash::make($password),
            ];

            $usersModel = new \App\Models\UserModel();
            $query = $usersModel->insert($values);
            if (!$query) {
                return redirect()->back()->with('Fail', 'Somthing went wrong');
                //     return redirect()->to('register')->with('Fail','Somthing went wrong');
            } else {

                return redirect()->to('auth/register')->with('Success', 'User registered Successfully');
            }
        }
    }

    public function Check()
    {


        $validation = $this->validate([
            'email' => [
                'rules' => 'required|valid_email|is_not_unique[users.email]',
                'errors' => [
                    'required' => 'Your name is required',
                    'valid_email' => 'Enter a valid Email',
                    'is_not_unique' => 'Email Not Registered '
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[5]|max_length[12]',
                'errors' => [
                    'required' => 'Password is required',
                    'min_length[5]' => 'Password length should be atleast 5 characters',
                    'max_length[12]' => 'Password length should not exceed 12 characters',
                    //'is_not_unique' => 'Incorrect Password'
                ]
            ]
        ]);

        if (!$validation) {
            return view('auth/login', ['validation' => $this->validator]);
        } else {

            //check user according to the request
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $usersModel = new \App\Models\UserModel();
            $user_Info = $usersModel->where('email', $email)->first();
            $check_password = hash::check($password, $user_Info['password']);

            if (!$check_password) {
                session()->setFlashdata('Fail', 'Incorrect Password');
                return redirect()->to('/auth')->withInput();
            } else {
                $user_id = $user_Info['id'];
                session()->set('loggedUser', $user_id);
                return redirect()->to('/dashboard');
            }
        }
    }



    public function logout()
    {
        if (session()->has('loggedUser')) {
            session()->remove('loggedUser');
            return redirect()->to('/auth?access=out')->with('Fail', 'You are logged out!');
        }
    }
}