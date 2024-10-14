<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id',
        'customer_name',
        'seat_number',
        'is_checked_in',
        'check_in_time'
    ];

    /**
     * Get the movie that owns the Ticket
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }
}
