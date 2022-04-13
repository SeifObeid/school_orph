<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Output extends Model
{
    use HasFactory;
    protected $guarded = [];
       public function user()
    {
        return $this->belongsTo(User::class);
    }
     public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
     public function productOutputs()
    {
        return $this->hasMany(ProductOutput::class);
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
