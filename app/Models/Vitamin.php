<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vitamin extends Model
{
    use HasFactory;

    protected $table = 'vitamin';
    protected $primaryKey = 'idvit';
    protected $fillable = ['idbalita', 'tgl_pemberian'];

    public function balita()
    {
        return $this->belongsTo(Balita::class, 'idbalita');
    }
}
