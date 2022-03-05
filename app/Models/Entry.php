<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entry extends Model
{
    use HasFactory;
    use SoftDeletes,CascadeSoftDeletes ;


    protected $cascadeDeletes = ['productsEntries'];

    protected $dates = ['deleted_at'];

    protected $guarded = [];


    public function productsEntries()
    {
        return $this->hasMany(ProductEntry::class,'entry_id');
    }
      public function user()
    {
        return $this->belongsTo(User::class);
    }
       public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

}
