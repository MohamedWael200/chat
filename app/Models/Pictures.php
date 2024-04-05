<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pictures extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'path' , 'albom_id'];

    public function album()
    {
        return $this->belongsTo(Albom::class);
    }
}
