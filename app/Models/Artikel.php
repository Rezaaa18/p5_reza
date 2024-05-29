<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $fillbale = ['judul','deskripsi','tanggal','image'];
    protected $visible = ['judul','deskripsi','tanggal','image'];
}
