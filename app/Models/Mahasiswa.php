<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $fillable = ['user_id', 'nim', 'nama', 'jenis_kelamin', 'alamat', 'tanggal_lahir'];

    public function krs()
    {
        return $this->hasMany(Krs::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
