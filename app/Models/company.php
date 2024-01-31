<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class company extends Authenticatable
{
    use HasFactory;
    // $table->string('comp_name');
    // $table->string('phone');
    // $table->text('logo');
    // $table->text('location');
    // $table->string('email');
    // $table->string('password');
   
    protected $fillable = [  'comp_name', 'phone','logo','location', 'email','password',];
    
    protected $hidden=[
        'password',
        'remember_token'

    ];
    public function posts()
    {
        return $this->hasMany(post::class);
    }
}
