<?php

namespace App\Controllers\Penduduk;

use App\Controllers\BaseController;
use App\Models\ArsipModel;
use App\Models\PendudukModel;
use App\Models\DesaModel;
use App\Models\PengajuanModel;
class HomePendudukController extends BaseController
{
    public function __construct()
    {
        $this->arsip = new ArsipModel();
        $this->penduduk = new PendudukModel();
        $this->desa = new DesaModel();
        $this->pengajuan = new PengajuanModel();
    }
    public function index(): string
    {
        $id = session()->get('id_desa');
        $data = [];
        $data['title'] = 'Surat Desa';
//        $data['desa'] = $this->desa->find($id);
        return view('PendudukPage/index',$data);
    }

    public function list_surat($id_desa): string
    {
        $surat = $this->arsip->getByDesa($id_desa);
        $data = [];
        $data['title'] = 'Daftar Surat';
        $data['surat_list'] = $surat;
//        dd($data);
        return view('PendudukPage/list_surat', $data);
    }

    public function notif(): string
    {
        $data = [];
        $data['title'] = 'Surat Desa';
        return view('PendudukPage/notification', $data);
    }
    public function download_page($id): string
    {
        $dataSurat = $this->arsip->find($id);
        if (empty($dataSurat)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
//        dd($dataSurat);
        $data = [
            'id_surat' => $dataSurat['id'],
            'nama_surat' => $dataSurat['nama_surat'],
            'kop_path' => $dataSurat['path_kop_surat'],
            'content' => $dataSurat['content_surat']
        ];
        $data['title'] = 'Download Surat';
        return view('PendudukPage/download', $data);
    }
    public function permohonan_page($id): string
    {
        $dataSurat = $this->arsip->find($id);
        if (empty($dataSurat)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $data = [
            'id_surat' => $dataSurat['id'],
            'nama_surat' => $dataSurat['nama_surat'],
            'kop_path' => $dataSurat['path_kop_surat'],
            'content' => $dataSurat['content_surat']
        ];
        $data['title'] = 'Permohonan Surat';
        return view('PendudukPage/permohonanpage', $data);
    }

    public function sendLinkDownload($id)
    {
        $suratId = 11;
        $data_pengajuan['status_pengajuan'] = 'disetujui';
        $this->pengajuan->update($id,$data_pengajuan);

        $secretKey = 'amamiyakun';
        $stringToHash = $suratId . $secretKey;
        $hashedValue = hash('sha256', $stringToHash);
        $originalURL = 'https://surat-dinamis-tala.my.id';

// Tambahkan hash ke URL
        $secureURL = $originalURL . '?hash=' . $hashedValue;
        $pendudukData = $this->penduduk->find($id);
        $token = 'H!jJva36Td+5d2o1oC1B';
        $target = $pendudukData['nomor_hp'];
//        dd($target);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $target,
                'message' => "Surat Anda Telah Disetujui, Silahkan di Unduh Melalui Link Berikut Ini . $secureURL",
                'url' => 'https://www.google.com',
                'filename' => 'filename',
                'schedule' => '0',
                'typing' => false,
                'delay' => '2',
                'countryCode' => '62'
            ),
            CURLOPT_HTTPHEADER => array(
                "Authorization: $token"
            ),
        ));

        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
        }
        curl_close($curl);

        if (isset($error_msg)) {
            echo $error_msg;
        }
//        return $response;
//        echo $secureURL;
        return redirect()->to('surat/surat-masuk')->with('message', 'surat yang telah disetujui telah di kirim');
    }

    public function permohonan()
    {
        $data = [
            'status_pengajuan' => 'di proses',
            'tanggal_pengajuan' => date('Y-m-d H:i:s'),
            'id_penduduk' => $this->request->getPost('id_penduduk'),
            'id_arsip' => $this->request->getPost('id_surat'),
            'id_desa' => $this->request->getPost('id_desa'),
            'id_user' => null
        ];
        $this->pengajuan->insert($data);
        return redirect()->to(base_url('surat-online/notif'));
    }
}
