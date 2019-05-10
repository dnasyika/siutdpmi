<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peramalan extends Model
{
    protected $table = 'tb_peramalan';
    public $timestamps = false;
    protected $fillable = ['id_peramalan','tgl_peramalan','bulan_peramalan', 'hasil'];
}
