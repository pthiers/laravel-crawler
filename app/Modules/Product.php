<?php

declare(strict_types=1);

namespace App\Modules;

class Product
{
    use DynamicLoadObject;

    public string $nombre;

    public ?string $marca;

    public string $url;

    public ?string $sitio;

    public ?float $precio = null;

    public ?float $precioOferta = null;

    public ?float $precioTarjeta = null;

    public ?string $categoria = null;

    public bool $stock = true;

    public array $imagenes = [];

    public function __construct(array $attributes = [])
    {
        $this->load($attributes);
    }

    public function isIgnorable(): bool
    {
        return $this->precio === null && $this->marca === null;
    }
}
