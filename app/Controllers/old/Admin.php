<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelMasterPublikasi;
use App\Models\ModelPublikasi;

class Admin extends BaseController
{
    protected $ModelMasterPublikasi;
    protected $ModelPublikasi;
    public function __construct()
    {
        helper('form');
        $this->ModelPublikasi = new ModelPublikasi;
        $this->ModelMasterPublikasi = new ModelMasterPublikasi();
    }

    public function index()
    {

        $data = [
            'judul' => 'Dashboard Admin',
            'page' => 'v_admin',
            'dataARC' => $this->ModelPublikasi->countARC(),
            'dataNonARC' => $this->ModelPublikasi->countNonARC(),
            'dataPenyusun' => $this->ModelPublikasi->countPenyusun(),
            'masterARC' => $this->ModelMasterPublikasi->countARC(),
            'masterNonArc' => $this->ModelMasterPublikasi->countNonARC(),
        ];
        return view('v_template_admin', $data);
    }
}
