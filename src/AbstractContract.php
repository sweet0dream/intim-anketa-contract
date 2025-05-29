<?php

namespace Sweet0dream;

abstract class AbstractContract
{
    public function getFieldEntity(
        string $key,
        string $name,
        string $type,
        bool $require = false,
        ?array $value = null,
    ): array
    {
        $result = [
            'key' => $key,
            'name' => $name,
            'type' => $type,
        ];
        if ($require) {
            $result = array_merge($result, ['require' => 1]);
        }
        if ($value) {
            $result = array_merge($result, ['value' => $value]);
        }

        return $result;
    }
}