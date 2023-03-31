<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    use HasFactory;
    protected $table = "department";
    protected $primaryKey = "department_id";

    public function problem_types()
    {
        return $this->belongsTo('App\Models\Problem_types', 'department_id', 'department');
    }
}
