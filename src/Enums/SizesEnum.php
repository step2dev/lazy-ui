<?php

namespace Lazyadm\LazyComponent\Enums;

enum SizesEnum: string
{
    use LazyEnumTrait;

    case xs = 'xs';
    case sm = 'sm';
    case md = 'md';
    case lg = 'lg';
//    case xl = 'xl';
//    case xxl = 'xxl';

    public function getClass(string $prefix = ''): string
    {
        return $prefix.'-'.$this->value;
    }

    public static function toArray(): array
    {
        return self::cases();
    }
}
