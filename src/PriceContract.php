<?php

namespace Sweet0dream;

use Sweet0dream\Enum\TypeEnum;

class PriceContract extends AbstractContract
{

    const EXPRESS = ['express', 'Экспресс'];
    const ONEHOUR = ['onehour', 'Один час'];
    const TWOHOUR = ['twohour', 'Два часа'];
    const NIGHT = ['night', 'Ночь'];

    const REQUIRE = [
        self::ONEHOUR
    ];

    const PRICE = [
        self::EXPRESS,
        self::ONEHOUR,
        self::TWOHOUR,
        self::NIGHT
    ];

    const EXCLUDE_FIELD = [
        TypeEnum::sal->value => [
            self::EXPRESS,
            self::TWOHOUR
        ],
        TypeEnum::mas->value => [
            self::TWOHOUR,
            self::NIGHT
        ],

    ];

    public function __construct(
        private readonly TypeEnum $type,
    ) {
    }

    public function getData(): ?array
    {
        $result = [];
        foreach (self::PRICE as $priceValue) {
            if (isset(self::EXCLUDE_FIELD[$this->type->value]) && in_array($priceValue, self::EXCLUDE_FIELD[$this->type->value])) {
                continue;
            }
            $result[$priceValue[0]] = $this->getFieldEntity(
                key: $priceValue[0],
                name: $priceValue[1],
                type: 'text',
                require: in_array($priceValue, self::REQUIRE)
            );
        }

        return $result ?? null;
    }
}