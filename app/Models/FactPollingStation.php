<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactPollingStation extends Model
{
    use HasFactory;

    public function dimCity() {
        return $this->belongsTo(DimCity::class, 'fk_dim_cities');
    }

    public function dimLocation() {
        return $this->belongsTo(DimLocation::class, 'fk_dim_locations');
    }

    public function dimTable() {
        return $this->belongsTo(DimTable::class, 'fk_dim_tables');
    }
}
