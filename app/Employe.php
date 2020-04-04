<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Employe extends Model
{

    use SoftDeletes;


    protected $fillable=['company_id','firstname','lastname','email','phone'];

    public function Company()
    {
        return $this->belongsTo(Company::class);
    }
}
