<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    use HasFactory;
    protected $table = 'pengurus';
    protected $primaryKey = 'id';

    protected $fillable = [

        'NIM',
        'nama',
        'kelamin',
        'fakultas',
        'periode', 
        'jabatan',
        'telp',
    ];

    public function organisasi()
    {
        return $this->belongsToMany(Organisasi::class)->withTimestamps();
    }
    
}
