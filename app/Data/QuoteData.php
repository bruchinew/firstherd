<?php

namespace App\Data;

use App\Models\User;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class QuoteData extends Data
{
    protected string $modelClass = User::class;

    public function __construct(
        public ?int $visitor_id,
        public ?string $name,
        public ?string $email,
        public ?string $phone,
        public ?string $address,
        public ?float $property_value,
        public ?float $coverage_amount,
        public ?string $property_type,
        public ?int $number_of_claims,
        public ?int $build_year,
        public ?string $location,
        public ?string $quote_date,
        public ?float $quote_amount,
        public ?string $status,
        public ?float $coverage_factor,
        public ?float $location_factor,
        public ?float $claims_factor,
        public ?float $age_factor,
        public ?int $quote_price_id
    ) {
    }

}
