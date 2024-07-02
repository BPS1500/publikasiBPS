<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Controller;
use Firebase\JWT\JWT;

class AuthController extends Controller
{
    use ResponseTrait;

    public function login()
    {
        // Ambil data yang dikirimkan oleh pengguna
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Kirim permintaan ke endpoint login di proyek SSO
        $response = $this->sendLoginRequest($username, $password);

        // Periksa apakah respons berhasil
        if ($response['status'] === 'success') {
            // Simpan token JWT yang diterima dari proyek SSO
            $token = $response['data']['token'];

            // Simpan token JWT ke dalam session atau local storage
            session()->set('token', $token);

            // Redirect ke halaman dashboard setelah berhasil login
            return redirect()->to('dashboard');
        } else {
            // Tanggapi jika login gagal
            return $this->fail($response['message']);
        }
    }

    private function sendLoginRequest($username, $password)
    {
        // Atur endpoint login dari proyek SSO
        $loginEndpoint = 'http://localhost/sso/public/login'; // Ganti dengan URL login dari proyek SSO Anda

        // Persiapkan data yang akan dikirimkan ke endpoint login
        $postData = [
            'username' => $username,
            'password' => $password
        ];

        // Kirim permintaan POST ke endpoint login
        $client = \Config\Services::curlrequest();
        $response = $client->request('POST', $loginEndpoint, [
            'form_params' => $postData
        ]);

        // Ambil respons dari permintaan
        $statusCode = $response->getStatusCode();
        $responseData = json_decode($response->getBody(), true);

        // Periksa apakah permintaan berhasil
        if ($statusCode === 200 && isset($responseData['token'])) {
            return ['status' => 'success', 'data' => $responseData];
        } else {
            // Tanggapi jika ada kesalahan dalam permintaan login
            return ['status' => 'error', 'message' => 'Login failed. Invalid credentials.'];
        }
    }

    // Metode lain yang diperlukan
}
