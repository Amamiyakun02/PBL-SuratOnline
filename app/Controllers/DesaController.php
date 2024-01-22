<?php

namespace App\Controllers;

use App\Models\KecamatanModel;
use App\Models\DesaModel;
use App\Models\PendudukModel;

class DesaController extends BaseController
{
    public function index(): string
    {
        $desa = new DesaModel();
        $dataDesa = $desa->findAll();
        $data = [
            'title' => 'Data Desa',
            'head' => 'Data Desa',
        ];
        foreach ($dataDesa as &$desa) {
            $kecamatanModel = new KecamatanModel();
            // Fetch the data from DesaModel based on id_desa
            $kecamatanData = $kecamatanModel->select('nama')->where('id', $desa['id_kecamatan'])->first();
            // Assign the 'desa' key to the Penduduk data
            $desa['kecamatan'] = $kecamatanData['nama'];
        }
        $data['desa'] = $dataDesa;
        return view('adminPage/Desa/desa_table', $data);
    }
    public function tambah_desa(): string
    {
        $kecamatanModel = new KecamatanModel();
        $data['kecamatan'] = $kecamatanModel->findAll();

        $page = [
            'title' => 'Tambah Desa',
            'head' => 'Tambah Desa',
            'data' => $data
        ];
        return view('adminPage/Desa/add_desa_form', $page);
    }
    
    public function insert(){

        $rules = [
            'nama' => 'required|min_length[3]|is_unique[desa.nama]|max_length[100]',
            'kodepos' => 'required|min_length[5]|max_length[6]',
            'kode_wilayah' => 'required|min_length[6]|max_length[20]',
        ];

            $desa = new DesaModel();
            $newData = [
                'nama' => $this->request->getPost('desa'),
                'kode_pos' => $this->request->getPost('kodepos'),
                'kode_wilayah' => $this->request->getPost('kode_wilayah'),
                'id_kecamatan' => $this->request->getPost('kecamatan')
            ];
            $desa->save($newData);

            return redirect()->to('desa')->with('success', 'Desa berhasil ditambahkan');

    }
    public function edit($id){
        $DataDesa = new DesaModel();
        $DataKecamatan = new KecamatanModel();
        $data = [
            'title' => 'Edit Desa',
            'head' => 'Edit  Desa',
            'kecamatan' => $DataKecamatan->findAll(),
            'desa' => $DataDesa->find($id)    
        ];
        // dd($data);
        return view('adminPage/Desa/edit_desa', $data);
    }

    public function update(){
        // Load the validation library
        $validation = \Config\Services::validation();
    
        // Define validation rules
        $validationRules = [
            'desa' => 'required',
            'kodepos' => 'required|numeric',
            'kode_wilayah' => 'required',
        ];
        // Set validation rules
        $validation->setRules($validationRules);
    
//        if ($validation->withRequest($this->request)->run()) {
            $desa = new DesaModel();
            $newData = [
                'nama' => $this->request->getPost('desa'),
                'kode_pos' => $this->request->getPost('kodepos'),
                'kode_wilayah' => $this->request->getPost('kode_wilayah')

            ];

            if ($desa->find($this->request->getPost('id'))) {
                $desa->update($this->request->getPost('id'), $newData);
                session()->setFlashdata('edit_success', 'Data Berhasil di Perbarui !!!');
                return redirect()->to('/desa');

            } else {
                // Handle the case where the record does not exist
                return redirect()->back()->with('error', 'Record not found');
            }
    }

    public function delete($id){
        $desa = new DesaModel();
        $desa->delete($id);
        return redirect()->to('/desa');
    }
}
