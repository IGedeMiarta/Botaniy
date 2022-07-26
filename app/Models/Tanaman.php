<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanaman extends Model
{
    use HasFactory;
    protected $table = 'tanaman';
    protected $guarded = ['id'];

    public function jenis(){
        return $this->belongsTo(JenisTanaman::class,'jenis_tanaman_id');
    }

}
