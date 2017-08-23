<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $guarded = [];
    protected $dates = ['startDateTime', 'endDateTime'];
    protected $appends = ['hours', 'owed'];

    public function getHoursAttribute($value)
    {
        return $this->endDateTime->diffInHours($this->startDateTime);
    }

    public function getOwedAttribute($value)
    {
        return $this->hours * $this->rate;
    }
}
