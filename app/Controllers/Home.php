<?php

namespace App\Controllers;

use App\Models\ArsipModel;
use App\Models\PendudukModel;
use App\Models\PengajuanModel;
use App\Models\UserModel;

class Home extends BaseController
{
    protected UserModel $user;
    protected PendudukModel $penduduk;
    protected ArsipModel $arsip;
    public function __construct()
    {
        $this->user = new UserModel();
        $this->penduduk = new PendudukModel();
        $this->arsip = new ArsipModel();
        $this->pengajuan = new PengajuanModel();
    }
    public function index()
    {
        return view('welcome_message');
    }
    public function dashboard()
    {
        $user_id = session()->get('user_id');
        $dataUser = $this->user->find($user_id);
        if ($dataUser['role'] == 'admin'){
            $data = [
                'title' => 'Dashboard',
                'head' => 'Dashboard',
                'data_user' => $dataUser,
                'pengajuan' => $this->pengajuan->dataPengajuan()
            ];

            return view('adminPage/dashboard', $data);
        }
        else{
            $data = [
                'title' => 'Dashboard',
                'head' => 'Dashboard',
                'data_user' => $dataUser,
                'pengajuan' => $this->pengajuan->dataPengajuanPerDesa($dataUser['id_desa'])

            ];
            return view('adminPage/dashboard', $data);
        }
    }
}
