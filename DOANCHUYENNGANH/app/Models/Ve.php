<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ve extends Model
{
    use HasFactory;
    protected $table = "ve";
    protected $primaryKey = 'idVe';
    public $timestamps = false;
    protected $fillable = [
        'idVe',
        'LoaiVe',
        'idLichChieu',
        'MaGheNgoi',
        'idHD',
        'TrangThai',
        'TienBanVe'
    ];
}
