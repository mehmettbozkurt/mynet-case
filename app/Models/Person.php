<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    public $table = 'persons';

    public $fillable = ['name', 'email', 'phone'];

    public function address()
    {
        return $this->hasOne(Address::class);
    }
}
