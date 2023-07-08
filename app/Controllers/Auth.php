<?php

namespace App\Controllers;

use App\Models\User;
use \App\Models\UserModel;
use Exception;

class Auth extends BaseController
{
    protected $user;
    public function __construct()
    {
        $this->user = new User();
    }
    public function index()
    {
        return view('auth_login');
    }

    public function register()
    {
        return view('auth_register');
    }

    public function addUser()
    {
        $save = $this->user->save($this->request->getVar());
        if ($save) {
            return "Sukses";
        } else {
            return "Gagal";
        }
        return redirect()->to('/');
    }

    public function login()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $user = $this->user->where(['username' => $username])->first();

        if ($user) {
            $datas = password_verify($password, $user['password']);
            if (!$datas) {
                throw new Exception('Password tidak benar!');
            }

            session()->set(['currentuser' => $user]);

            return redirect()->to('/');
        } else {
            throw new Exception('User tidak ada');
        }
    }

    public function logout()
    {
        session()->remove('currentuser');
        return redirect()->to('/auth');
    }
}
