<?php

namespace App\Models;

use App\Models\kategori;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Anak_Asuh extends Model
{
    use HasFactory;
    protected $guarded = []; 
    protected $appends = ['age'];

    // public function age()
    // {
    //     return Carbon::parse($this->attributes['TanggalLahir'])->age;
    // }
    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['TanggalLahir'])->age;
    }
    
    public function kategoris(){
        return $this->belongsTo(kategori::class,'id_kategori','id');
    }
}
