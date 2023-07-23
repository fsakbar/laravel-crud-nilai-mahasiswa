<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa;

class Matkul extends Model
{
    use HasFactory;
    protected $table = 'matkul';
    protected $fillable = ['matkul'];

    public function mahasiswa(){
        return $this->belongsToMany(Mahasiswa::class)->withPivot(['nilai']);
    }
}
