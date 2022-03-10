<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactCountVotes extends Model
{
    use HasFactory;
    protected $table = 'fact_count_votes';
    protected $guarded = [];
}
