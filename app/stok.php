<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stok extends Model
{
    protected $table = 'tb_kantong';
    public $timestamps = false;
    protected $fillable = ['noKantong', 'idDonor','komponen', 'tglAftap', 'tglKadaluarsa', 'jenis'];

    public function variabel()
    {
        return $this->belongsTo('App\donor', 'idDonor', 'idDonor');
    }
}
