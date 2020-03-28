<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    protected $fillable=['companie_id','firstname','lastname','email','phone'];

    public function Company()
    {
        return $this->belongsTo(Company::class);
    }
}
