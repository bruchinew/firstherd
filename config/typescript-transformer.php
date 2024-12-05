<?php

use Spatie\TypeScriptTransformer\Collectors\DefaultCollector;
use Spatie\TypeScriptTransformer\Collectors\EnumCollector;
use Spatie\TypeScriptTransformer\Transformers\DtoTransformer;
use Spatie\TypeScriptTransformer\Transformers\EnumTransformer;
use Spatie\TypeScriptTransformer\Writers\TypeDefinitionWriter;

return [
    'auto_discover_types' => [
        app_path('Data'),
    ],

    'collectors' => [
        DefaultCollector::class,
        EnumCollector::class,
    ],

    'transformers' => [
        DtoTransformer::class,
        EnumTransformer::class,
    ],

    'default_type_replacements' => [
        DateTime::class => 'string',
        DateTimeImmutable::class => 'string',
        Carbon\CarbonInterface::class => 'string',
        Carbon\CarbonImmutable::class => 'string',
        Carbon\Carbon::class => 'string',
    ],

    'output_file' => resource_path('js/types/generated.d.ts'),

    'writer' => TypeDefinitionWriter::class,

    'formatter' => null,

    'transform_to_native_enums' => false,

    'transform_null_to_optional' => false,

    'attribute' => Spatie\TypeScriptTransformer\Attributes\TypeScript::class,

    'default_type' => 'any',


];
