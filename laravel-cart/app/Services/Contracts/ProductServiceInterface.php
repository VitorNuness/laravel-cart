<?php

namespace App\Services\Contracts;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

interface ProductServiceInterface
{
    public function getAllProducts(): Collection;
    public function findOneProduct(string $id): Product;
    public function createProduct(array $values): Product;
    public function updateProduct(string $id, array $values): Product;
    public function deleteProduct(string $id): void;
}