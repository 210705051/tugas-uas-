<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_acara';

    protected $fillable = [
        'nama_acara',
        'tgl_acara',
        'lokasi',
        'id_pen',
        'id_par',
    ];

    public function penyelenggara()
    {
        return $this->belongsTo(Penyelenggara::class, 'id_pen');
    }

    public function partisipan()
    {
        return $this->belongsTo(Partisipan::class, 'id_par');
    }
}
