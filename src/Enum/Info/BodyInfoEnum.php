<?php

declare(strict_types=1);

namespace Sweet0dream\Enum\Info;

enum BodyInfoEnum: string
{
    case Hud = 'Худощавое';
    case Oby = 'Обычное';
    case Spo = 'Спортивное';
    case Plo = 'Плотное';
}