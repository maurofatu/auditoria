<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactNews extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function factPollingStation() {
        return $this->belongsTo(FactPollingStation::class, 'fk_fact_polling_stations');
    }

    public function dimTypesNews() {
        return $this->belongsTo(DimTypesNews::class, 'fk_dim_types_news');
    }
}
