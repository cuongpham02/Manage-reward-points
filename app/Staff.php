<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Staff extends Model
{
    public $timestamps = false;
        protected $fillable = [
              'name', 'email','phone','birthday','department'
        ];
        protected $dates = ['deleted_at'];
        protected $primaryKey = 'id';
        protected $table = 'staffs';
        public function points(){
            return $this->belongsToMany(Point::class,'point__staff','staff_id','point_id')->withPivot('date');;
        }
        
}
