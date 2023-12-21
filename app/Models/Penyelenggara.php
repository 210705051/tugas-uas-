<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyelenggara extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pen';
    protected $fillable = [
        'nama_pen', 
        'kontak', 
        'email',
        'alamat',
    ];

    public function acaras()
    {
        return $this->hasMany(Acara::class, 'id_pen');
    }
}
