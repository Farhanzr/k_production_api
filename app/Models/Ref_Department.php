<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ref_Department extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'ref_department';
    protected $guarded = [];
    public $timestamps = true;
}
