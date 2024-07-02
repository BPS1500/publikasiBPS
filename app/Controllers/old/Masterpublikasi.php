<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ModelMasterPublikasi;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Masterpublikasi extends BaseController
{
    protected $ModelMasterPublikasi;
    public function __construct()
    {
        helper('form');
        $this->ModelMasterPublikasi = new ModelMasterPublikasi();
    }
    public function index()
    {
        $data = [
            'judul' => 'Master Publikasi',
            'page' => 'v_masterpublikasi',
            'bahasa' => $this->ModelMasterPublikasi->getMstBahasa(),
            'frekuensi' => $this->ModelMasterPublikasi->getMstFrekuensi(),
            'MasterPublikasi' => $this->ModelMasterPublikasi->getMasterPublikasi(),
        ];
        return view('v_template_admin', $data);
    }

    public function Add()
    {

        $data = [
            'id_jenispublikasi' => $this->request->getPost('id_jenispublikasi'),
            'jenis_publikasi' => $this->request->getPost('jenis_publikasi'),
            'judul_publikasi_ind' => $this->request->getPost('judul_publikasi_indonesia'),
            'judul_publikasi_eng' => $this->request->getPost('judul_publikasi_inggris'),
            'nama_penyusun' => $this->request->getPost('nama_penyusun'),
            'frekuensi_terbit' => $this->request->getPost('frekuensi_terbit'),
            'bahasa' => $this->request->getPost('bahasa'),
            'katalog' => $this->request->getPost('katalog'),
            'no_issn' => $this->request->getPost('no_issn')
        ];

        // $data = ['judul_publikasi_ind' => $this->request->getPost('judul_publikasi_ind')];
        $this->ModelMasterPublikasi->Add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to(base_url('MasterPublikasi'));
    }

    public function hapus($id)
    {

        // $data = $this->ModelMasterPublikasi->getDataForUpdate($id);
        // echo $data[0]['id'];


        $this->ModelMasterPublikasi->delete_masterpublikasi($id);
        return redirect()->to(base_url('MasterPublikasi'));
    }

    public function getDataEdit()
    {
        $getData = $this->request->getPost('id');
        $data = $this->ModelMasterPublikasi->getDataForUpdate($getData);

        echo json_encode($data);
    }

    public function edit()
    {

        $id = $this->request->getPost('id');
        $data = [
            'judul_publikasi_ind' => $this->request->getPost('judul_publikasi_indonesia'),
            'judul_publikasi_eng' => $this->request->getPost('judul_publikasi_inggris'),
            'nama_penyusun' => $this->request->getPost('nama_penyusun'),
            'frekuensi_terbit' => $this->request->getPost('frekuensi_terbit'),
            'bahasa' => $this->request->getPost('bahasa'),
            'katalog' => $this->request->getPost('katalog'),
            'no_issn' => $this->request->getPost('no_issn')
        ];


        $this->ModelMasterPublikasi->updateData($id, $data);
        return redirect()->to(base_url('MasterPublikasi'));
    }

    public function fileUpload()
    {


        $fileimpor = $this->request->getFile('file');
        $ext = $fileimpor->guessExtension();
        $upload_file = $_FILES['file']['name'];



        $namafile = date('Y-m-d_h-i-s') . "_masterpub." . $ext;
        $fileimpor->move('uploads', $namafile);




        //Baca File
        //$fpath = base_url('uploads/'.$namafile);

        $fpath = 'C:/xampp/htdocs/PublikasiBPS/public/uploads/' . $namafile;
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadsheet = $reader->load($fpath);


        // $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
        // $spreadsheet = $reader->load($fpath);
        $data = $spreadsheet->getActiveSheet()->toArray();
        // var_dump($data[2][6]);
        // exit();
        if (count($data) >= 2) {
            for ($i = 2; $i + 1 < count($data); $i++) {
                $input[$i] = [
                    'id_jenispublikasi' => $data[$i][0],
                    'jenis_publikasi' => $data[$i][0],
                    'judul_publikasi_ind' => $data[$i][1],
                    'judul_publikasi_eng' => $data[$i][2],
                    'nama_penyusun' => $data[$i][3],
                    'frekuensi_terbit' => $data[$i][4],
                    'bahasa' => $data[$i][5],
                    'no_issn' => $data[$i][6],
                    'katalog' => $data[$i][7],
                ];

                if ($data[$i][0] != NULL) {
                    $this->ModelMasterPublikasi->Add($input[$i]);
                }
            }
        }
        return redirect()->to(base_url('MasterPublikasi'));
    }
}
// 