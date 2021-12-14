<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    use HasFactory;

    protected $table = 'numbers';
    protected $primaryKey = 'id';

    public function contact(){
        return $this->belongsTo(Contact::class, 'contact_id');
    }

}
