<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DinhDangPhim extends Model
{
    use HasFactory;
    protected $table = "dinhdangphim";
    protected $primaryKey = 'idDinhDangPhim';
    public $timestamps = false;
    protected $fillable = [
        'idDinhDangPhim',
        'idPhim',
        'idMH'
    ];
}
