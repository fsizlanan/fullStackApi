<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrunDetay extends Model
{
    use HasFactory;
    protected $guarded = [];

    public $timestamps = false;

    public function urun()
    {
        return $this->belongsTo('App\Models\Urun');
    }
}
