<?php

namespace Lazyadm\LazyComponent\Enums;

trait LazyEnumTrait
{
    public static function toArray(): array
    {
        return self::cases();
    }

    public static function getClasses(string $prefix = ''): array
    {
        return array_map(static fn ($value) => $value->getClass($prefix), self::toArray());
    }
}
