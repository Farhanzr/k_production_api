<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ref_Employment_Status extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'ref_employment_status';
    protected $guarded = [];
    public $timestamps = true;
}
