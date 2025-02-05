declare namespace App.Data {
export type QuoteData = {
visitor_id: number | null;
name: string | null;
email: string | null;
phone: string | null;
address: string | null;
property_value: number | null;
coverage_amount: number | null;
property_type: string | null;
number_of_claims: number | null;
build_year: number | null;
location: string | null;
quote_date: string | null;
quote_amount: number | null;
status: string | null;
coverage_factor: number | null;
location_factor: number | null;
claims_factor: number | null;
age_factor: number | null;
quote_price_id: number | null;
visitor: any | App.Data.UserData;
};
export type QuoteFormData = {
visitor_id: number | null;
name: string | null;
email: string | null;
phone: string | null;
address: string | null;
property_value: number | null;
coverage_amount: number | null;
property_type: string | null;
number_of_claims: number | null;
build_year: number | null;
location: string | null;
quote_date: string | null;
quote_amount: number | null;
status: string | null;
coverage_factor: number | null;
location_factor: number | null;
claims_factor: number | null;
age_factor: number | null;
quote_price_id: number | null;
};
export type UserData = {
id: number;
name: string;
email: string;
created_at: string;
};
}
