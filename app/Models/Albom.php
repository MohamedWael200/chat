<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Albom extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'cover'];

    public function pictures()
    {
        return $this->hasMany(Pictures::class);
    }
}
