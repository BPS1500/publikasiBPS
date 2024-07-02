<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPublikasi;

class ReviewPublikasi extends BaseController
{
    protected $ModelPublikasi;
    public function __construct()
    {
        helper('form');
        $this->ModelPublikasi = new ModelPublikasi;
    }
    public function index()
    {
        $data = [
            'judul' => 'Review Publikasi',
            'page' => 'v_reviewpublikasi',
            'ReviewPublikasi' => $this->ModelPublikasi->AllData(),
        ];
        return view('v_template_admin', $data);
    }


    public function addCatatanPemeriksa()
    {

        $id = $this->request->getPost('id_publikasi');

        $data = [
            'catatan' => $this->request->getPost('catatan'),
            'pemeriksa' => $this->request->getPost('pemeriksa'),
            'id_publikasi' => $this->request->getPost('id_publikasi'),
        ];

        $this->ModelPublikasi->addCatatanPemeriksa($data);
        session()->setFlashdata('pesan', 'Data Catatan Pemeriksa Berhasil di Tambahkan');
        return redirect()->to(base_url('ReviewPublikasi/Komentar/' . $id));
    }
    public function Komentar($id_publikasi)
    {

        $dataKomentar = $this->ModelPublikasi->OneDataKomenter($id_publikasi);
        $data = [
            'judul' => 'Komentar',
            'page' => 'v_komentar',
            'Komentar' => $dataKomentar,
            'id_publikasi' => $id_publikasi,
        ];

        return view('v_template_admin', $data);
    }

    public function Komentar_Selesai($id_komentar, $id_publikasi, $status)
    {
        echo "selesai" . $id_komentar;

        $data = [
            'selesai' => $status
        ];

        $this->ModelPublikasi->Komentar_Selesai($data, $id_komentar);
        session()->setFlashdata('pesan', 'Data Komentar Berhasil di Ubah');
        return redirect()->to(base_url('ReviewPublikasi/Komentar/' . $id_publikasi));
    }

    public function setStatus()
    {
        $id = $_POST['id-publikasi'];
        $status = $_POST['status'];

        $data = [
            'status' => $status,
            'flag' => $status
        ];

        $this->ModelPublikasi->updateStatus($id, $data);
        session()->setFlashdata('pesan', 'Data Komentar Berhasil di Ubah');
        return redirect()->to(base_url('ReviewPublikasi'));
    }
    public function delete_reviewpublikasi($id_publikasi)
    {

        $this->ModelPublikasi->delete_reviewpublikasi($id_publikasi);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus');
        return redirect()->to(base_url('ReviewPublikasi'));
    }
}
