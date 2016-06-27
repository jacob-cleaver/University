<?php
/**
 * This is the user model to the database.
 */
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ //This has been added by Laravel when the authentication model was created.
        'name', 'email', 'password', //This allows for many assignments to be sent to the database in one line of code
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ //Laravel uses this to keep the password private
        'password', 'remember_token',
    ];
}
