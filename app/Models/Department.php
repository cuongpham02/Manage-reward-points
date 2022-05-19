<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Department extends Model
{
    use softDeletes;
    public $timestamps = false;
    protected $fillable = [
          'name', 'desc', 'status'
    ];
    protected $primaryKey = 'id';
    protected $table = 'departments';
    public function staffs(){
        return $this->hasMany(Staff::class,'department_id','id');
    }
}
