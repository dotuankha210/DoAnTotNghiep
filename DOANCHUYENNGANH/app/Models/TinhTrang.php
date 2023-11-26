<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinhTrang extends Model
{
    use HasFactory;
    protected $table = "tinhtrang";
    protected $primaryKey = 'idTinhTrangPhongChieu';
    public $timestamps = false;
    protected $fillable = [
        'idTinhTrangPhongChieu',
        'TinhTrang',
    ];
}
