<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory;
    use SoftDeletes ;
  //  protected $dates = ['deleted_at'];
    protected $dates = ['deleted_at'];

    // protected $cascadeDeletes = ['entries'];

    // or use queues to soft delete comments
 //       protected $cascadeDeletes = ['entries'];

    protected $guarded = [];
     public function entries()
    {
        return $this->hasMany(Entry::class);
    }


}
