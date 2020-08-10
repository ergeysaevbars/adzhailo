<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['project_name', 'price', 'type', 'company_id', 'user_id', 'date', 'shift_id'];
    public $timestamps = false;

    public function company()
    {
        dd(1);
        return $this->belongsTo(Company::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }
}
