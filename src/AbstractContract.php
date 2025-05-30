<?php

namespace Sweet0dream;

abstract class AbstractContract
{
    public function getFieldEntity(
        string $name,
        bool $require = false,
        ?array $value = null,
    ): array
    {
        $result['name'] = $name;
        if ($require) {
            $result = array_merge($result, ['require' => 1]);
        }
        if ($value) {
            $result = array_merge($result, ['value' => $value]);
        }

        return $result;
    }
}