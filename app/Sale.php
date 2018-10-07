<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Staudenmeir\EloquentParamLimitFix\ParamLimitFix;

class Sale extends Model
{
    public $timestamps = false;

    protected $guarded = [];
}
