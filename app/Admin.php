<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'tbl_test';

    protected $primaryKey = 'user_id';

    protected $guarded = [];
    
}
