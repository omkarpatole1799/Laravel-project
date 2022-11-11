<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class omkarModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "tbl_omkar_users";
    protected $primaryKey = "id";
}
 