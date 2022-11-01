<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'cat_id ', 'title', 'slug', 'price', 'des', 'stock','files'];

    public function from()
    {
      return $this->belongsTo('App\Models\Category', 'cat_id');
    }
}
