<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThoiTiet extends Model
{
    use HasFactory;
    protected $table="thoitiet";
    public $fillable = [
        'loai',
        'noiDung',
        'thietbi_id',
    ];

    public function thietbi()
    {
        return $this->belongsTo(Thietbi::class, 'thietbi_id');
    }
}
