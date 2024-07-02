<?php

namespace App\Controllers;
use App\Models\ModelMasterPublikasi;
use App\Models\ModelPublikasi;
class Penyusun extends BaseController
{

    protected $ModelMasterPublikasi;
    protected $ModelPublikasi;
    public function __construct()
    {
        
        $this->ModelPublikasi = new ModelPublikasi();
        $this->ModelMasterPublikasi = new ModelMasterPublikasi();
    }
    public function index(): string
    {
        $datadash = $this->ModelPublikasi->dashData();
        $statuspublikasi = $this->ModelPublikasi->getMstStatusReview();
        $data = [
            'menu' => 'Dasbor',
            'judul' => 'Dasbor Penyusun',
            'page' => 'v_penyusun',
            'dataDashboard'=> $datadash,
            'status'=>$statuspublikasi

        ];
        return view('v_template_penyusun', $data);
    }

    // public function index()
    // {

    //     $data = [
    //         'judul' => 'Dashboard Admin',
    //         'page' => 'v_admin',
    //         'dataARC' => $this->ModelPublikasi->countARC(),
    //         'dataNonARC' => $this->ModelPublikasi->countNonARC(),
    //         'dataPenyusun' => $this->ModelPublikasi->countPenyusun(),
    //         'masterARC' => $this->ModelMasterPublikasi->countARC(),
    //         'masterNonArc' => $this->ModelMasterPublikasi->countNonARC(),
    //     ];
    //     return view('v_template_admin', $data);
    // }
}
