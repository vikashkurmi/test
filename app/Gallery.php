<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'tbl_gallery';
    //protected $timestamp = false;
    //protected $primaryKey = 'gallery_id';
    protected $fillable = ['title', 'description', 'image'];
   

    
}

?>