<?php

declare(strict_types=1);

namespace Sweet0dream\Enum\Info;

enum RoleInfoEnum: string
{
    case Active = 'Актив';
    case Passive = 'Пассив';
    case Universal = 'Универсал';
}