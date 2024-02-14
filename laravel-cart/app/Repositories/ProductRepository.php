<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository implements ProductRepositoryInterface
{
    public function __construct(
        private Product $model,
    )
    {
        //
    }

    public function getAllProducts(): Collection
    {
        return $this->model->all();
    }

    public function findOneProduct(string $id): Product
    {
        return $this->model->findOrFail($id);
    }

    public function storeProduct(array $values): Product
    {
        $product = $this->model->create($values);
        return $product;
    }

    public function updateProduct(string $id, array $values): Product
    {
        $product = $this->model->findOrFail($id);
        $product->update($values);
        return $product;
    }

    public function deleteProduct(string $id): void
    {
        $this->model->findOrFail($id)
                    ->delete();
    }

}