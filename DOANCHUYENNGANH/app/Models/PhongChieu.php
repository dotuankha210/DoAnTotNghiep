<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongChieu extends Model
{
    use HasFactory;
    protected $table = "phongchieu";
    protected $primaryKey = 'idPhongChieu';
    public $timestamps = false;
    protected $fillable = [
        'idPhongChieu',
        'TenPhong',
        'idManHinh',
        'SoChoNgoi',
        'idTinhTrang',
        'SoHangGhe',
        'SoGheMotHang'
    ];
}
