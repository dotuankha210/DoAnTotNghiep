<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThucAn extends Model
{
    use HasFactory;
    protected $table = "thucan";
    protected $primaryKey = 'MATHUCAN';
    public $timestamps = false;
    protected $fillable = [
        'MATHUCAN',
        'TENTHUCAN',
        'DONGIA'
    ];
}
