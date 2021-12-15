<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Point extends Model
{
    public $timestamps = false;
        protected $fillable = [
              'desc', 'number_point'
        ];
        protected $dates = ['deleted_at'];
        protected $primaryKey = 'id';
        protected $table = 'points';
        public function staffs(){
            return $this->belongsToMany(Staff::class,'point__staff','point_id','staff_id');
        }
}
