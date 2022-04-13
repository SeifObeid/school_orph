<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;



   protected $guarded = [];
    public function productEntries()
    {
        return $this->hasMany(ProductEntry::class,'product_id');
    }
    public function productOutputs()
    {
        return $this->hasMany(ProductOutput::class,'product_id');
    }

}
