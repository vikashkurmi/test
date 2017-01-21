<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = 'tbl_test';
	protected $timestamp = false;
	protected $primaryKey = 'user_id';
    protected $guarded = [];

    
}
