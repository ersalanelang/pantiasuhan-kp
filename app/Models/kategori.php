<?php

namespace App\Models;

use App\Models\Anak_Asuh;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function anak__asuhs()
    {
        return $this->hasMany(Anak_Asuh::class);
    }
}
