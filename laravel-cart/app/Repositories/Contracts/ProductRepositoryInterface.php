<?php

namespace App\Repositories\Contracts;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

interface ProductRepositoryInterface
{
    public function getAllProducts(): Collection;
    public function findOneProduct(string $id): Product;
    public function storeProduct(array $values): Product;
    public function updateProduct(string $id, array $values): Product;
    public function deleteProduct(string $id): void;
}