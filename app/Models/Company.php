<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name'];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
