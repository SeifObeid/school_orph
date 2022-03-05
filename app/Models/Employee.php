<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $guarded = [];
      public function custodies()
    {
        return $this->hasMany(Custody::class);
    }
    public function outputs()
    {
        return $this->hasMany(Output::class);
    }
}
