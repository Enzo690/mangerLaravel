<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredables extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = 'id';

    protected $fillable = [
        'ingredient_id',
        'plat_id'
    ];
}
