<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Apartment;

class Optional extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'icon', 'slug'];

    public static function generateSlug($title){
        return Str::slug($title, '-');
    }

    public function apartments(){
        return $this->belongsToMany(Apartment::class);
    }

}
