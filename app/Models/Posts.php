<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'kategori_id',
        'isi',
        'gambar',
        'petugas_id',
        'status'
    ];

}
