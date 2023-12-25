<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DesaModel;
use App\Models\KecamatanModel;
use App\Models\PendudukModel;

class PendudukController extends BaseController
{

    public function index()
    {
        // $data = [
        //     'title' => 'Data Penduduk',
        //     'head' => 'Data Penduduk'
        // ];

        $data['title'] = 'Daftar Penduduk';
        $data['head'] = 'Daftar Penduduk';
        $pendudukModel = new PendudukModel();
        $dataPenduduk = $pendudukModel->findAll();

        foreach ($dataPenduduk as &$penduduk) {
            $desaModel = new DesaModel();
            // Fetch the data from DesaModel based on id_desa
            $desaData = $desaModel->select('nama')->where('id', $penduduk['id_desa'])->first();
            // Assign the 'desa' key to the Penduduk data
            $penduduk['desa'] = $desaData['nama'];
        }
        $data['penduduk'] = $dataPenduduk;
//        dd($data);
        return view('adminPage/Penduduk/penduduk_table', $data);
    }

    public function tambah_penduduk()
    {
        $kecamatanModel = new KecamatanModel();
        $desaModel = new DesaModel();
        $data['desa'] = $desaModel->findAll();
        // var_dump($data['desa']);exit;
        $data['title'] = 'Tambah Penduduk';
        $data['head'] = 'Tambah Penduduk';
        $data['kecamatan'] = $kecamatanModel->findAll();
        return view('adminPage/Penduduk/add_penduduk_form', $data);
    }

    public function insert()
    {
        $pendudukModel = new PendudukModel();

        // Mengambil data dari form
        $data = [
            'NIK' => $this->request->getPost('nik'),
            'Nama' => $this->request->getPost('nama'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'nomor_hp' => $this->request->getPost('nomor_hp'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'alamat' => $this->request->getPost('alamat'),
            'RT' => $this->request->getPost('rt'),
            'RW' => $this->request->getPost('rw'),
            'id_desa' => $this->request->getPost('desa'),
            'agama' => $this->request->getPost('agama'),
            'status_perkawinan' => $this->request->getPost('status_kawin'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'kewarganegaraan' => $this->request->getPost('kewarganegaraan'),
        ];
        // dd($data);
        // Simpan data ke database
        $pendudukModel->insert($data);

        // Redirect ke halaman lain setelah berhasil menyimpan data
        return redirect()->to('/penduduk')->with('success', 'Data penduduk berhasil disimpan.');
        // return redirect()->to('/penduduk');

        // Jika tidak melalui metode POST, kembalikan ke halaman sebelumnya
        // return redirect()->back();
    }

    public function edit($id)
    {
        $pendudukModel = new PendudukModel(); // Sesuaikan dengan model yang Anda gunakan
        $data['penduduk'] = $pendudukModel->find($id);
        $desaModel = new DesaModel();
        $data['desa'] = $desaModel->getAllDesa();
        $data['title'] = 'Tambah Penduduk';
        $data['head'] = 'Tambah Penduduk';

        // Kirim data penduduk ke view untuk proses edit
        return view('Admin-Page/Penduduk/edit', $data);
    }

    public function update()
    {
        $pendudukModel = new PendudukModel(); // Sesuaikan dengan model yang Anda gunakan

        // Ambil data dari form
        $data = [
            'NIK' => $this->request->getPost('nik'),
            'nama' => $this->request->getPost('nama'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'nomor_hp' => $this->request->getPost('nomor_hp'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'alamat' => $this->request->getPost('alamat'),
            'RT' => $this->request->getPost('rt'),
            'RW' => $this->request->getPost('rw'),
            'id_desa' => $this->request->getPost('desa'),
            'agama' => $this->request->getPost('agama'),
            'status_perkawinan' => $this->request->getPost('status_kawin'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'kewarganegaraan' => $this->request->getPost('kewarnanegaraan'),
            // Tambahkan field lainnya...
        ];

        // Simpan perubahan ke database
        $id = $this->request->getPost('id'); // Ambil ID penduduk dari form
        $pendudukModel->update($id, $data);

        // Redirect ke halaman setelah proses update
        return redirect()->to('/penduduk');
    }

    public function delete($id)
    {
        $pendudukModel = new PendudukModel(); // Sesuaikan dengan model yang Anda gunakan
        $pendudukModel->delete($id);

        // Redirect atau tindakan lain setelah penghapusan data
        return redirect()->to('/penduduk');

    }
}
