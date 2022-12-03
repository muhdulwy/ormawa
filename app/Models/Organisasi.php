<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    use HasFactory;
    protected $table = 'organisasi';
    protected $primaryKey = 'id';

    protected $fillable = [

        'nama'
    ];

    public function kegiatan()
    {
        return $this->hasmany(Kegiatan::class);
    }

    public function prestasi()
    {
        return $this->hasmany(Prestasi::class);
    }

    public function pengurus()
    {
        return $this->belongsToMany(Pengurus::class)->withTimestamps();
    }
}
