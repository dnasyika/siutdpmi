<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class donor extends Model
{
    protected $table = 'tb_donor';
    public $timestamps = false;
    protected $fillable = ['idDonor', 'tglDonor', 'noKTP', 'donorKe', 'donorTerakhir', 'tempatDonor',
        'instansiPenyelenggara', 'donorAphereris', 'HB', 'HCT', 'beratBadan', 'tensiDarah', 'suhuBadan', 'nadi', 'namaPetugas'];

    public function variabel()
    {
        return $this->belongsTo('App\pendonor', 'noKTP', 'noKTP');
    }
}
