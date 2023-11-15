<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $connection = 'mysql';
    protected $table = 'employee';
    protected $guarded = [];
    public $timestamps = true;

    public function department()
    {
        return $this->belongsTo(Ref_Department::class, 'DEPARTMENT_CODE', 'CODE');
    }
    
    public function employmentStatus()
    {
        return $this->belongsTo(Ref_Employment_Status::class, 'EMPLOYMENT_STATUS', 'CODE');
    }
}
