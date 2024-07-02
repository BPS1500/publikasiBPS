<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPublikasi;
use PhpParser\Node\Stmt\Label;

class Publikasi extends BaseController
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
            'judul' => 'Publikasi',
            'page' => 'v_publikasi',
            'Publikasi' => $this->ModelPublikasi->AllData(),
            'dataARC' => $this->ModelPublikasi->countARC(),
        ];

        // dd($data);s
        return view('v_template_penyusun', $data);
    }
    public function Ajupublikasi()
    {
        $data = [
            'judul' => 'Pengajuan Publikasi',
            'page' => 'v_ajupublikasi',
            'Ajupublikasi' => $this->ModelPublikasi->AllData(),
            'jenispublikasi' => $this->ModelPublikasi->AllJenispublikasi(),
            'fungsi' => $this->ModelPublikasi->AllFungsi(),
        ];
        return view('v_template_penyusun', $data);
    }
    public function Judulpublikasi()
    {
        $id_jenispublikasi = $this->request->getPost('id_jenispublikasi');
        $judulpublikasi = $this->ModelPublikasi->AllJudulpublikasi($id_jenispublikasi);
        echo '<option value="">--Pilih Judul Publikasi--</option>';
        foreach ($judulpublikasi as $key => $jp) {
            echo "<option value=" . $jp['id'] . ">" . $jp['judul_publikasi_ind'] . "</option>";
        }
    }
    public function InsertData()
    {


        var_dump($_POST);
        if ($this->validate([
            'id_jenispublikasi' => [
                'label' => 'Jenis Publikasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Dipilih!!'
                ]
            ],
            'id_judulpublikasi' => [
                'label' => 'Judul Publikasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Dipilih!!'
                ]
            ],
            'id_fungsi' => [
                'label' => 'Fungsi Pengusul',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Dipilih!!'
                ]
            ],
            'nama_penyusun' => [
                'label' => 'Nama Penyusun',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Dipilih!!'
                ]
            ],
            'link_publikasi' => [
                'label' => 'Link Publikasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Dipilih!!'
                ]
            ],


        ])) {
            //Jika Valid
            $data = [
                'id_user_upload' => $this->request->getPost('id_user_upload'),
                'id_jenispublikasi' => $this->request->getPost('id_jenispublikasi'),
                'id_judulpublikasi' => $this->request->getPost('id_judulpublikasi'),
                'id_fungsi' => $this->request->getPost('id_fungsi'),
                'nama_penyusun' => $this->request->getPost('nama_penyusun'),
                'link_publikasi' => $this->request->getPost('link_publikasi'),
                'link_spsnrkf' => $this->request->getPost('link_spsnrkf'),
                'link_spsnres2' => $this->request->getPost('link_spsnres2'),
            ];
            // dd($data);
            $this->ModelPublikasi->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan!!');
            return redirect()->to(base_url('Publikasi'));
        } else {
            //Jika Tidak Valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Publikasi/Ajupublikasi'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function LihatKomentar($id_publikasi)
    {
        $dataKomentar = $this->ModelPublikasi->OneDataKomenter($id_publikasi);
        $data = [
            'judul' => 'Komentar',
            'page' => 'v_komentar_penyusun',
            'Komentar' => $dataKomentar,
            'id_publikasi' => $id_publikasi,
        ];

        return view('v_template_penyusun', $data);
    }



    public function getLink()
    {
        $id = $this->request->getPost('id');
        $dataLink = $this->ModelPublikasi->getDataLink($id);
        echo $dataLink[0]['link_publikasi'];
    }

    public function setLink()
    {
        $id = $this->request->getPost('id');

        $dataLink = $this->request->getPost('link');

        $data = [
            'link_publikasi' => $dataLink,
            'flag' => 1,
            'status' => 1,
        ];

        $this->ModelPublikasi->setDataLink($id, $data);
        return redirect()->to(base_url('Publikasi'));
    }


    public function getDataEdit()
    {
        $getData = $this->request->getPost('id');
        $data = $this->ModelPublikasi->getKomentar($getData);

        echo json_encode($data);
    }

    public function editkomentar()
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


        $this->ModelPublikasi->updateKomentar($id, $data);
        return redirect()->to(base_url('MasterPublikasi'));
    }
}
