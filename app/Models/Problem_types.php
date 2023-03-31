<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problem_types extends Model
{
    use HasFactory;

    protected $table = "problem_types";
    protected $primaryKey = "id";
    protected $fillable = ['problems', 'department'];

    public function departments()
    {
        return $this->hasMany('App\Models\department', 'department_id', 'department');
    }
}
