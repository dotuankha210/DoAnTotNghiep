<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiManHinh extends Model
{
    use HasFactory;
    protected $table = "loaimanhinh";
    protected $primaryKey = 'idMH';
    public $timestamps = false;
    protected $fillable = [
        'idMH',
        'TenMH',
    ];
}
