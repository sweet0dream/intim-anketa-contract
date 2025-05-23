<?php

namespace Sweet0dream;

use Sweet0dream\Enum\Service\{
    SexServiceEnum,
    MinServiceEnum,
    OkoServiceEnum,
    MasServiceEnum,
    SadServiceEnum,
    ZreServiceEnum,
    OraServiceEnum,
    IzvServiceEnum,
    ProServiceEnum
};

class ServiceContract {
    private const SERVICE_SEX = [
        'name' => 'Секс',
        'value' => SexServiceEnum::class
    ];

    private const SERVICE_MIN = [
        'name' => 'Минет',
        'value' => MinServiceEnum::class
    ];

    private const SERVICE_OKO = [
        'name' => 'Окончание',
        'value' => OkoServiceEnum::class
    ];

    private const SERVICE_MAS = [
        'name' => 'Массаж',
        'value' => MasServiceEnum::class
    ];

    private const SERVICE_SAD = [
        'name' => 'БДСМ',
        'value' => SadServiceEnum::class
    ];

    private const SERVICE_ZRE = [
        'name' => 'Зрелища',
        'value' => ZreServiceEnum::class
    ];

    private const SERVICE_ORA = [
        'name' => 'Оральные',
        'value' => OraServiceEnum::class
    ];

    private const SERVICE_IZV = [
        'name' => 'Извращения',
        'value' => IzvServiceEnum::class
    ];

    private const SERVICE_PRO = [
        'name' => 'Прочее',
        'value' => ProServiceEnum::class
    ];

    private const SERVICE = [
        'sex' => self::SERVICE_SEX,
        'min' => self::SERVICE_MIN,
        'oko' => self::SERVICE_OKO,
        'mas' => self::SERVICE_MAS,
        'sad' => self::SERVICE_SAD,
        'zre' => self::SERVICE_ZRE,
        'ora' => self::SERVICE_ORA,
        'izv' => self::SERVICE_IZV,
        'pro' => self::SERVICE_PRO
    ];

    private const MAS_SERVICE = [
        'mas' => self::SERVICE_MAS,
        'min' => self::SERVICE_MIN,
        'oko' => self::SERVICE_OKO
    ];

    public function __construct(
        private string $type
    ) {
    }

    public function getData(): array
    {
        return array_map(fn($v) => [
            'name' => $v['name'],
            'value' => array_column(
                $v['value']::cases(),
                'value',
                'name'
            )
        ], match ($this->type) {
            IntimAnketaContract::TYPE_MAS => self::MAS_SERVICE,
            default => self::SERVICE
        });
    }
}