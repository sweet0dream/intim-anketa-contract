<?php

declare(strict_types=1);

namespace Sweet0dream\Enum\Info;

enum AparInfoEnum: string
{
    case In = 'Только на территории салона';
    case Out = 'Работаем только на выезд';
    case Or = 'По договоренности';
}