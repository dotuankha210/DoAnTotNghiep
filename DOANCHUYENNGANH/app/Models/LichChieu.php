<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichChieu extends Model
{
    use HasFactory;
    protected $table = "lichchieu";
    protected $primaryKey = 'idLichChieu';
    public $timestamps = false;
    protected $fillable = [
        'idLichChieu',
        'ThoiGianChieu',
        'idPhong',
        'idDinhDang',
        'GiaVe',
        'TrangThai'
    ];
}
