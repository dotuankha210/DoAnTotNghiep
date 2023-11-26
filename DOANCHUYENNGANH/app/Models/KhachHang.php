<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    use HasFactory;
    protected $table = "khachhang";
    protected $primaryKey = 'idKH';
    public $timestamps = false;
    protected $fillable = [
        'idKH',
        'HoTen',
        'NgaySinh',
        'DiaChi',
        'SDT',
        'CMND',
        'DiemTichLuy'
    ];
}
