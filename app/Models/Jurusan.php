<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    protected $fillable = ['nama_jurusan'];
    protected $visible = ['nama_jurusan'];

    public function Industri()
    {
        return $this->hasMany(Industri::class);

    }
}
