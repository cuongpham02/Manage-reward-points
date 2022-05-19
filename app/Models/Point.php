<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
