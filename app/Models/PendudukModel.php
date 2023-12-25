<?php

namespace App\Models;

use CodeIgniter\Model;

class PendudukModel extends Model
{
    protected $table            = 'penduduk';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'NIK',
        'Nama',
        'tempat_lahir',
        'nomor_hp',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'RT',
        'RW',
        'id_desa',
        'agama',
        'status_perkawinan',
        'pekerjaan',
        'kewarganegaraan'
    ];
    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    public function getPendudukByDesa($idDesa)
    {
        return $this->builder()
            ->select('penduduk.*') // Adjust this based on your actual table structure
            ->join('penduduk', 'penduduk.id_desa = desa.id')
            ->where('desa.id', $idDesa)
            ->get()
            ->getResultArray();
    }
}
