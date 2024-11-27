<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chamados extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
        'user_id'
    ];

    public function create(){
        return $this->belongsTo(Chamados::class);
    }
}
