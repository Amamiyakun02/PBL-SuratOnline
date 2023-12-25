<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KecamatanModel;

class KecamatanController extends BaseController
{
    public function index(): string
    {
        $Kecamatan = new KecamatanModel();
        $dataKecamatan = $Kecamatan->findAll();
        $data = [
            'title' => 'Data Kecamatan',
            'head' => 'Data Kecamatan',
            'kecamatan' => $dataKecamatan
        ];
        return view('adminPage/Kecamatan/kecamatan_table', $data);
    }

    public function tambah_kecamatan(): string
    {
        $data = [
            'title' => 'Tambah Kecamatan',
            'head' => 'Tambah Kecamatan'
        ];
        return view('adminPage/Kecamatan/add_kecamatan_form', $data);
    }

    public function insert(){
        $Data = [];
        
        $rules = [
            'kecamatan' => 'required|min_length[3]|is_unique[kecamatan.nama]|max_length[100]',
            'kodepos' => 'required|min_length[5]|max_length[6]',
            'kode_wilayah' => 'required|min_length[6]|max_length[20]',
        ];
        if($this->validate($rules)){
            $kecamatan = new KecamatanModel();
            $newData = [
                'nama' => $this->request->getPost('kecamatan'),
                'kode_pos' => $this->request->getPost('kodepos'),
                'kode_wilayah' => $this->request->getPost('kode_wilayah')
            ];
            $kecamatan->save($newData);
            return redirect()->to('kecamatan')->with('success', 'Kecamatan berhasil ditambahkan');
        }
        else{
            $Data['validation'] = $this->validator;
        }
        return redirect()->to('kecamatan/tambah');
    }

    public function edit($id)
    {
        $DataKecamatan = new KecamatanModel();
        $data = [
            'title' => 'Edit Kecamatan',
            'head' => 'Edit  Kecamatan',
            'kecamatan' => $DataKecamatan->find($id)    
        ];
        // dd($data);
        return view('adminPage/Kecamatan/edit_kecamatan', $data);
    }


    public function update()
    {
        $kecamatan = new KecamatanModel();
        $newData = [
            'nama' => $this->request->getPost('kecamatan'),
            'kode_pos' => $this->request->getPost('kodepos'),
            'kode_wilayah' => $this->request->getPost('kode_wilayah')
        ];
        $kecamatan->update($this->request->getPost('id'), $newData);
        return redirect()->to('kecamatan');
    }

    // method untuk delete data
    public function delete($id){
        $kecamatan = new KecamatanModel();
        $kecamatan->delete($id);
        return redirect()->to('kecamatan');
    }
}
