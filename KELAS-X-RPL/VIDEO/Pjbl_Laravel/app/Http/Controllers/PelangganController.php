<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelangganController extends Model
{
    use HasFactory;

    protected $table = 'pelanggans';
    protected $primaryKey = 'idpelanggan'; // ini penting
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'pelanggan',
        'alamat',
        'telp',
        'jeniskelamin',
        'email',
        'password'
    ];
}
