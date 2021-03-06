<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agency extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function positions()
    {
        return $this->hasMany(Position::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
    public function archives()
    {
        return $this->hasMany(Archive::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
