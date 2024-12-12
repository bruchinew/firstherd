<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'visitor_id',
        'name',
        'email',
        'phone',
        'address',
        'property_value',
        'coverage_amount',
        'property_type',
        'number_of_claims',
        'build_year',
        'location',
        'quote_date',
        'quote_amount',
        'status',
        'coverage_factor',
        'location_factor',
        'claims_factor',
        'age_factor',
        'quote_price_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        // Add any attributes that should be hidden
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'quote_date' => 'datetime',
    ];

    /**
     * Get the quote price associated with the quote.
     */
    public function quotePrice()
    {
        return $this->belongsTo(QuotePrice::class, 'quote_price_id', 'price_id');
    }
}
