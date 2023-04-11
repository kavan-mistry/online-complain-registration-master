<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Complain extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "complain";
    protected $primaryKey = "complain_id";

    public function images()
    {
        return $this->hasMany('App\Image', 'complain_id');
    }

    public function dept_images()
    {
        return $this->belongsTo('App\Models\dept_images', 'complain_id', 'complain');
    }

    public function departmentcm()
    {
        return $this->hasMany('App\Models\department', 'department_id', 'department_id');
    }
}
