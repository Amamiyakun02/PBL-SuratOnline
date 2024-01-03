<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajuanModel extends Model
{
    protected $table            = 'pengajuan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['status_pengajuan','tanggal_pengajuan','id_penduduk','id_arsip','id_user','id_desa'];
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
    public function dataPengajuan()
    {
        $this->select('pengajuan.id as pengajuan_id,pengajuan.status_pengajuan,pengajuan.tanggal_pengajuan, pengajuan.id_desa, penduduk.Nama, penduduk.NIK, penduduk.nomor_hp, arsip.id, arsip.nama_surat')
        ->join('penduduk', 'pengajuan.id_penduduk = penduduk.id')
        ->join('arsip', 'pengajuan.id_arsip = arsip.id');
        return $this->get()->getResultArray();

    }
    public function dataPengajuanPerDesa($id)
    {
        $this->select('pengajuan.id as pengajuan_id,pengajuan.status_pengajuan,pengajuan.tanggal_pengajuan, pengajuan.id_desa, penduduk.Nama, penduduk.NIK, penduduk.nomor_hp, arsip.id, arsip.nama_surat')
        ->join('penduduk', 'pengajuan.id_penduduk = penduduk.id')
        ->join('arsip', 'pengajuan.id_arsip = arsip.id')->where('pengajuan.id_desa',$id);
        return $this->get()->getResultArray();

    }
}
