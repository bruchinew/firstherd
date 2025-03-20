<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $casts = [
        'quote_date' => 'datetime',
    ];

    protected $fillable = [
            'visitor_id',
            'quote_price_id',
            'quote_amount',
            'quote_date',
            'status',
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
            'quote_reference',
            'policy_data',
        ];


    public function quotePrice()
    {
        return $this->belongsTo(QuotePrice::class, 'quote_price_id', 'price_id');
    }
    public function visitor()
    {
        return $this->belongsTo(User::class, 'visitor_id');
    }
}
