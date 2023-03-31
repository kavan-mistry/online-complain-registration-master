<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Kyslik\ColumnSortable\Sortable;

class Complain extends Model
{
    use HasFactory;
    protected $table = "complain";
    protected $primaryKey = "complain_id";

    public function images()
    {
        return $this->hasMany('App\Image', 'complain_id');
    }
}
