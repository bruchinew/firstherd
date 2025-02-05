<?php

namespace App\Data;

use App\Models\Quote;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class QuoteData extends Data
{
    protected string $modelClass = Quote::class;

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
        public ?int $quote_price_id,
        public Lazy|UserData $visitor,
    ) {
    }

    public static function fromModel(Quote $quote): self
    {
        return new self(
            visitor_id: $quote->visitor_id,
            name: $quote->name,
            email: $quote->email,
            phone: $quote->phone,
            address: $quote->address,
            property_value: $quote->property_value,
            coverage_amount: $quote->coverage_amount,
            property_type: $quote->property_type,
            number_of_claims: $quote->number_of_claims,
            build_year: $quote->build_year,
            location: $quote->location,
            quote_date: $quote->quote_date,
            quote_amount: $quote->quote_amount,
            status: $quote->status,
            coverage_factor: $quote->coverage_factor,
            location_factor: $quote->location_factor,
            claims_factor: $quote->claims_factor,
            age_factor: $quote->age_factor,
            quote_price_id: $quote->quote_price_id,
            visitor: Lazy::whenLoaded('visitor', $quote, fn () => UserData::from($quote->visitor)),
        );
    }
}
