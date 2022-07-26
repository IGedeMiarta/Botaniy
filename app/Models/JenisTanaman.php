<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisTanaman extends Model
{
    use HasFactory;
    protected $table = 'jenis_tanaman';
    protected $guarded = ['id'];

    public function tanaman(){
        return $this->hasMany(Tanaman::class);
    }
}
