<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// $table->unsignedBigInteger('user_id');
// $table->foreign('user_id')->references('id')->on('users');
// $table->unsignedBigInteger('post_id');
// $table->foreign('post_id')->references('id')->on('posts');
// $table->string('firstname');
// $table->string('lastname');
// $table->integer('age');
// $table->string('phone')->unique();
// $table->string('email')->unique();
// $table->text('resume');
class submitCareer extends Model
{
    protected $fillable=['user_id','post_id','firstname','lastname','age','phone','email','resume'];
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function post()
    {
        return $this->belongsTo(post::class);
    }

}
