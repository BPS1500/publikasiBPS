<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\Models\ModelLogin;
use App\Models\ModelPenyusun;

class Login extends BaseController
{
    protected $ModelLogin;
    protected $modelPenyusun;
    public function __construct()
    {
        helper('form');
        $this->ModelLogin = new ModelLogin;
        $this->modelPenyusun = new ModelPenyusun();
    }
    public function index()
    {
        $data = [
            'judul' => 'Login',
            'page' => 'v_login'
        ];
        return view('v_template_login', $data);
    }

    public function LoginAdmin()
    {
        $data = [
            'judul' => 'Login',
            'page' => 'v_login_admin'
        ];
        return view('v_template_login', $data);
    }

    public function CekLoginAdmin()
    {
        if ($this->validate([
            'username' => [
                'label' => 'username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} !',
                ]
            ],
            'password' => [
                'label' => 'password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} !',
                ]
            ]
        ])) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cek_login = $this->ModelLogin->LoginAdmin($username, $password);
            if ($cek_login) {
                // Jika Login Berhasil
                session()->set('nama_admin', $cek_login['nama_admin']);
                session()->set('username', $cek_login['username']);
                return redirect()->to(base_url('Admin'));
            } else {
                // Jika Gagal Login Karena Salah Password
                session()->getFlashdata('pesan', 'Username Atau Password Salah!');
                return redirect()->to(base_url('Login/LoginAdmin'));
            }
        } else {
            // Jika Entry Tidak Valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Login/LoginAdmin'));
        }
    }

    public function LogoutAdmin()
    {
        session()->remove('nama_admin');
        session()->remove('username');
        session()->setFlashdata('pesan', 'Logout Berhasil!');
        return redirect()->to(base_url('Login/LoginAdmin'));
    }

    public function LoginPenyusun()
    {
        $data = [
            'judul' => 'Login',
            'page' => 'v_login_penyusun'
        ];
        return view('v_template_login', $data);
    }

    public function CekLoginPenyusun()
    {
        if ($this->validate([
            'username' => [
                'label' => 'username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} !',
                ]
            ],
            'password' => [
                'label' => 'password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} !',
                ]
            ]
        ])) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cek_login = $this->ModelLogin->LoginPenyusun($username, $password);
            if ($cek_login) {
                // Jika Login Berhasil

                session()->set('nama_penyusun', $cek_login['nama_penyusun']);
                session()->set('username', $cek_login['username']);

                return redirect()->to(base_url('Penyusun'));
            } else {
                // Jika Gagal Login Karena Salah Password
                session()->getFlashdata('pesan', 'Username Atau Password Salah!');
                return redirect()->to(base_url('Login/LoginPenyusun'));
            }
        } else {
            // Jika Entry Tidak Valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Login/LoginPenyusun'));
        }
    }

    public function LogoutPenyusun()
    {
        session()->remove('nama_penyusun');
        session()->remove('username');
        session()->setFlashdata('pesan', 'Logout Berhasil!');
        return redirect()->to(base_url('Login/LoginPenyusun'));
    }
    public function RegisPenyusun($id = null)
    {
        if ($id == null) {
            $q = $this->modelPenyusun->getPenyusun();
            $data = [
                'q' => $q,
                'judul' => 'Registrasi Penyusun',
                'page' => 'v_register_penyusun'
            ];
        } else {
            $q = $this->modelPenyusun->getPenyusun($id);
            $data = [
                'q' => $q,
                'judul' => 'Update Data Penyusun',
                'page' => 'v_update_penyusun'
            ];
        }

        return view('v_template_admin', $data);
    }

    public function addPenyusun()
    {
        $data = [
            'nama_penyusun' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'level' => 0,
        ];

        $this->ModelLogin->add($data);
        session()->setFlashdata('pesan', 'Berhasil ditambah');
        return redirect()->to(base_url('Login/RegisPenyusun'));
    }

    public function updatePenyusun()
    {

        $id = $this->request->getPost('id_penyusun');
        $data = [
            'nama_penyusun' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'level' => 0,
        ];

        $this->modelPenyusun->updatePenyusun($id, $data);
        session()->setFlashdata('pesan', 'Berhasil diupdate');
        return redirect()->to(base_url('Login/RegisPenyusun'));
    }

    public function deletePenyusun($id)
    {
        $this->modelPenyusun->deletePenyusun($id);
        return redirect()->to(base_url('Login/RegisPenyusun'));
    }
}
