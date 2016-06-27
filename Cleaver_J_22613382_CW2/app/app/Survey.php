<?php
/**
 * This is the survey model to the database.
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable =[
        'name',
        'description',
        
    ];
}
