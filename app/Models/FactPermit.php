<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactPermit extends Model
{
    use HasFactory;

    public function factPollingStation() {
        return $this->belongsTo(FactPollingStation::class, 'fk_fact_polling_stations');
    }
}
