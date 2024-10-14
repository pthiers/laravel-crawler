<?php
declare(strict_types=1);

namespace App\Modules;

trait DynamicLoadObject
{
    public function load(array $data): void
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }
}
