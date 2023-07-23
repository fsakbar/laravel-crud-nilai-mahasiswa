<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Matkul;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $fillable = ['nim', 'nama', 'program_studi', 'no_hp'];

    public function matkul(){
        return $this->belongsToMany(Matkul::class)->withPivot(['nilai'])->withTimestamps();
    }
}
