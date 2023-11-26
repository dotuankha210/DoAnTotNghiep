<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phim extends Model
{
    use HasFactory;
    protected $table = "phim";
    protected $primaryKey = 'idPhim';
    public $timestamps = false;
    protected $fillable = [
        'idPhim',
        'TenPhim',
        'MoTa',
        'ThoiLuong',
        'NgayKhoiChieu',
        'HangSanXuat',
        'DaoDien',
        'NamSX',
        'ApPhich',
        'IdTheLoai',
    ];
}
