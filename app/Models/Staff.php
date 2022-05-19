<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use softDeletes;
    public $timestamps = false;
    protected $fillable = [
          'name', 'email','phone','birthday','department_id'
    ];
    protected $dates = ['deleted_at'];
    protected $primaryKey = 'id';
    protected $table = 'staffs';
    public function points(){
        return $this->belongsToMany(Point::class,'point__staff','staff_id','point_id')->withPivot('date');;
    }
    public function department()
    {
        return $this->belongsTo(Department::class,'department_id','id');
    }
}
