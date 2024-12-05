<?php

namespace App\Data;

use App\Models\User;
use Momentum\Lock\Data\DataResource;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class UserData extends DataResource
{
    protected string $modelClass = User::class;

    public function __construct(
        public int $id,
        public string $name,
        public string $email,
        public string $created_at
    ) {
    }

    public static function fromModel(User $user): self
    {
        return new self(
            id: $user->id,
            name: $user->name,
            email: $user->email,
            created_at: $user->created_at->toDateString(),
        );
    }
}
