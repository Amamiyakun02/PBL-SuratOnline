<?php

namespace App\Controllers\Penduduk;

use App\Controllers\BaseController;

class HomePendudukController extends BaseController
{
    public function index(): string
    {
        return view('PendudukPage/index');
    }

    public function list(): string
    {
        return view('PendudukPage/list_surat');
    }

    public function notif(): string
    {
        return view('PendudukPage/notification');
    }
}
