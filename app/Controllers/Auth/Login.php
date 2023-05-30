<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        return view('Auth/Login');
    }

    public function signin()
    {
        if (!$this->validate([
            'username' => 'required',
            'password' => 'required'
        ])) {
            return redirect()->back()
                ->with('errors', $this->validator->getErrors())
                ->withInput();
        }
        $username = trim($this->request->getVar('username'));
        $password = trim($this->request->getVar('password'));
        $model = model('UsersModel');

        if (!$user = $model->getUserBy('username', $username)) {
            return redirect()->back()
                ->with('msg', [
                    'type' => 'danger',
                    'body' => 'The data entered is incorrect.',
                ]);
        }


        if (!password_verify($password, $user->password)) {
            return redirect()->back()
                ->with('msg', [
                    'type' => 'danger',
                    'body' => 'The data entered is incorrect.',
                ]);
        }

        session()->set([
            'id_user' => $user->id,
            'username' => $user->username,
            'is_logged' => true
        ]);

        return redirect()->route('home')->with('msg', [
            'type' => 'danger',
            'body' => 'welcome again ' . $user->username,
        ]);
    }

    public function signout()
    {
        session()->destroy();
        return redirect()->route('login');
    }
}
