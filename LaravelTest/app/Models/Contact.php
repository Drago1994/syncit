<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';
    protected $primaryKey = 'id';
    protected $fillable = ['firstname', 'lastname'];
    public $timestamps = false;

    public function numbers(){
        return $this->hasMany(Number::class,'contact_id', 'id');
    }


}
