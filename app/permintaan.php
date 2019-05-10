<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class permintaan extends Model
{
    protected $table = 'tb_permintaan';
    public $timestamps = false;
    protected $fillable = ['id_permintaan', 'tanggal_permintaan','komponen', 'golongan_darah', 'rhesus', 'jumlah_permintaan',
        'id_user', 'status'];

    public function variabel()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
}
