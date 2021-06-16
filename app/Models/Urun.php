<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urun extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function kategoriler()
    {
        return $this->belongsToMany('App\Models\kategori','kategori_uruns');
    }

    public function detay()
    {
        return $this->hasOne('App\Models\UrunDetay');
    }
}
