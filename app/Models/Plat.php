<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plat extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'weight',
        'price',
        'category_id',
        'origin_id',
        'type_id'
    ];

    public $timestamps = false;

    public function ingredients()
    {
        return $this->morphedByMany(Ingredient::class, 'ingredable');
    }

   public function category()
   {
       return $this->belongsTo(Category::class);
   }

   public function type()
   {
       return $this->belongsTo(Type::class);
   }

    public function origin()
    {
        return $this->belongsTo(Origin::class);
    }

}
