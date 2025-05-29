<?php

declare(strict_types=1);

namespace Sweet0dream\Enum\Info;

enum ChestInfoEnum: string
{
    case LessSize1 = 'Менее 1-го';
    case Size1 = '1-ый размер';
    case Size2 = '2-ой размер';
    case Size3 = '3-ий размер';
    case Size4 = '4-ый размер';
    case Size5 = '5-ый размер';
    case Size6 = '6-ой размер';
    case MoreSize6 = 'Более 6-го';
}