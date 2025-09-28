<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Divisa extends Model
{
    protected $table = 'divisas';
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nombre'
    ];
}
