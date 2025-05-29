<?php

declare(strict_types=1);

namespace Sweet0dream\Enum;

enum TypeEnum: string
{
    case ind = 'ind';
    case sal = 'sal';
    case man = 'man';
    case tsl = 'tsl';
    case mas = 'mas';

    public static function getTypes(): array
    {
        return array_column(self::cases(), 'value');
    }
}