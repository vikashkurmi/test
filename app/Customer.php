<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   protected $table = 'tbl_test';

   //protected $fillable = ['user_first_name'];	//allowing value in database insertion.

   protected $guarded = ['user_first_name'];	//notallowing gaurded value in inserted data.

   protected $primaryKey = 'user_id';
}
