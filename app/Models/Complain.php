<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Kyslik\ColumnSortable\Sortable;

class Complain extends Model
{
    use HasFactory, Sortable;
    protected $table = "complain";
    protected $primaryKey = "complain_id";

    public $sortable = ['complain_id', 'name', 'email', 'address' , 'city' , 'pt' , 'state' , 'zip' , 'dept'];
}
