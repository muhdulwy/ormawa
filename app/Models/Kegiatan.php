<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Kegiatan extends Model
{
    use HasFactory;
    protected $table = 'kegiatan';
    protected $primaryKey = 'id';
    protected $dates = ['tgl_mulai','tgl_selesai',];


    protected $fillable = [

        'nama',
        'dokumentasi',
        'tgl_mulai',
        'tgl_selesai',
        'thn_akademik',
        'organisasi_id'
    ];

    // public function getTgl_Mulai(){
    //     return Carbon::parse($this->attributes['tgl_mulai'])
    //         ->translatedFormat('l, d F Y');
    // }

    // public function getTgl_Selesai(){
    //     return Carbon::parse($this->attributes['tgl_selesai'])
    //         ->translatedFormat('l, d F Y');
    // }

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }
}
