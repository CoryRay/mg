<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $dates = ['startDateTime', 'endDateTime'];

    public function getHoursAttribute($value)
    {
        return $this->endDateTime->diffInHours($this->startDateTime);
    }

    public function getOwedAttribute($value)
    {
        return $this->hours * $this->rate;
    }
}
