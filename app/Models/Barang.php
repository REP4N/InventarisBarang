<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = [
        'no',
        'user_id',
        'nama_barang',
        'kategori',
        'harga',
        'jumlah',
        'aksi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}