<?php

namespace App\Controllers\Penduduk;

use App\Controllers\BaseController;

class HomePendudukController extends BaseController
{
    public function index(): string
    {
        $data = [];
        $data['title'] = 'Surat Desa';

        return view('PendudukPage/index1',$data);
    }

    public function list(): string
    {
        $data = [];
        $data['title'] = 'Daftar Surat';

        return view('PendudukPage/list_surat', $data);
    }

    public function notif(): string
    {
        $data = [];
        $data['title'] = 'Surat Desa';
        return view('PendudukPage/notification', $data);
    }
}
