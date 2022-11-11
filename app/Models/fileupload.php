<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fileupload extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "fileupload";
    protected $primaryKey = "id";
}
