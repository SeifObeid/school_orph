<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductEntry extends Model
{
    use HasFactory;
    use SoftDeletes ;

    protected $guarded = [];
     public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function entry()
    {
        return $this->belongsTo(Entry::class, 'entry_id');
    }

}
