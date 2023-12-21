<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partisipan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_par';
    protected $fillable = [
        'nama_par',
        'email',
        'kontak',
        'alamat',
        'tgl_reg',
    ];

    public function acaras()
    {
        return $this->hasMany(Acara::class, 'id_par');
    }
}
