<?php

namespace App\Services;

use App\Models\Product;
use App\Services\Contracts\ProductServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class ProductService implements ProductServiceInterface
{
    public function __construct(
        protected Product $model,
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

    public function createProduct(array $values): Product
    {
        return $this->model->create($values);
    }

    public function updateProduct(string $id, array $values): Product
    {
        $product = $this->model->findOrFail($id);
        $product->update($values);
        return $product;
    }

    public function deleteProduct(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }

}