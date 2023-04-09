<?php

namespace Lazyadm\LazyComponent\Enums;

enum BtnEnum: string
{
    use LazyEnumTrait;

    case Default = '';

    case Primary = 'primary';

    case Secondary = 'secondary';

    case Success = 'success';

    case Danger = 'error';

    case Error = 'error';

    case Warning = 'warning';

    case Info = 'info';

    case Light = 'light';

    case Dark = 'dark';

    case Link = 'link';

    public function getClass(string $prefix = 'btn btn-'): string
    {
        return $prefix.$this->value;
    }
}
