<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// $table->unsignedBigInteger('company_id');
// $table->foreign('company_id')->references('id')->on('companies');
// $table->unsignedBigInteger('category_id');
// $table->foreign('category_id')->references('id')->on('categories');
// $table->string('title');
// $table->string('description');
// $table->datetimes('postDate');
// $table->string('image');
class post extends Model
{
    use HasFactory;
    protected $fillable= ['title','description','postDate','image'  ];

    public function company()
    {
        return$this->belongsTo(company::class);
    }
    public function category()
    {
        return$this->belongsTo(category::class);
    }
    public function submitCareer()
    {
        return $this->hasOne(submitCareer::class);
    }
}
