<?php

namespace Sweet0dream;
use Exception;
use Sweet0dream\Enum\Meta\{
    SingularMetaEnum,
    PluralMetaEnum
};
use Sweet0dream\Enum\TypeEnum;

class IntimAnketaContract
{
    private const FIELD_DOP = [
        'text' => ['name' => 'Дополнительно о себе', 'type' => 'textarea', 'require' => 1]
    ];

    private TypeEnum $type;

    /**
     * @throws Exception
     */
    public function __construct(string $value) {
        $type = TypeEnum::tryFrom($value);

        if (is_null($type)) {
            throw new Exception('No available type in contract');
        }

        $this->type = $type;
    }

    public function getField(): ?array
    {
        return in_array($this->type->value, TypeEnum::getTypes()) ? [
            'info' => (new InfoContract($this->type))->getData(),
            'service' => (new ServiceContract($this->type))->getData(),
            'price' => (new PriceContract($this->type))->getData(),
            'dop' => self::FIELD_DOP
        ] : null;
    }

    public function toJson(): false|string
    {
        return json_encode($this->getField(), JSON_NUMERIC_CHECK|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    }

    public function getSingularMeta(): array
    {
        return array_combine(TypeEnum::getTypes(), array_column(SingularMetaEnum::cases(), 'value'));
    }

    public function getPluralMeta(): array
    {
        return array_combine(TypeEnum::getTypes(), array_column(PluralMetaEnum::cases(), 'value'));
    }

    public function getSingularTypeName(): string
    {
        return $this->getSingularMeta()[$this->type->value];
    }

    public function getPluralTypeName(): string
    {
        return $this->getPluralMeta()[$this->type->value];
    }
}