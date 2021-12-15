<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Point_Staff extends Model
{
    public $timestamps = false;
        protected $fillable = [
              'staff_id', 'point_id','date'
        ];
        protected $primaryKey = 'id';
        protected $table = 'point__staff';
        // public function points(){
        //     return $this->belongsToMany(Point::class,'users_roles','user_id','role_id');
        // }
}
