<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Custody extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function productOutput()
    {
        return $this->belongsTo(ProductOutput::class, 'product_output_id');
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }


}
