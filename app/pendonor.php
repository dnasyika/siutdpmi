<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pendonor extends Model
{
    protected $table = 'tb_pendonor';
    public $timestamps = false;
    protected $fillable = ['noKTP', 'namaPendonor','alamatPendonor', 'jenisKelamin', 'tempatLahir', 'tglLahir', 'status',
        'pekerjaanPendonor', 'golDarah', 'rhesus', 'ibuKandung', 'noHP'];

    public function donor()
    {
        return $this->hasMany('App\donor', 'noKTP', 'noKTP');

    }
}
