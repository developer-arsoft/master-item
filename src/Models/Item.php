<?php

namespace ArsoftModules\MasterItem\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model 
{
    use SoftDeletes;

    protected $table = 'items';
    
}
