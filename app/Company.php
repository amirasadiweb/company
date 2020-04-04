<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Company extends Model
{

    use SoftDeletes;

    protected $fillable=['name','email','logo','website'];


//    protected static function boot()
//    {
//        parent::boot();
//
//        static::deleting(function($companys) {
//            foreach ($companys->employes()->get() as $employ) {
//                $employ->delete();
//            }
//        });
//    }


    public function employes()
    {
        return $this->hasMany(Employe::class);
    }
}
