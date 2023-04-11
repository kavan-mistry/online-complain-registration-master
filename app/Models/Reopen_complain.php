<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reopen_complain extends Model
{
    use HasFactory;
    protected $table = "reopen_complain";
    protected $primaryKey = "reopen_id";
}
