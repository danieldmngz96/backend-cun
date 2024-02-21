<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "products";

    protected $fillable = [
      'id',
      'title',
      'price',
      'description',
      'creationAt',
      'updatedAt',
      'categoryId'
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'categoryId');
    }
}
