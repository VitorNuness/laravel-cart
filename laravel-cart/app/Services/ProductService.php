<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Services\Contracts\ProductServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class ProductService implements ProductServiceInterface
{
    public function __construct(
        protected ProductRepositoryInterface $poductRepository,
    )
    {
        //
    }

    public function getAllProducts(): Collection
    {
        return $this->poductRepository->getAllProducts();
    }

    public function findOneProduct(string $id): Product
    {
        return $this->poductRepository->findOneProduct($id);
    }

    public function createProduct(array $values): Product
    {
        return $this->poductRepository->storeProduct($values);
    }

    public function updateProduct(string $id, array $values): Product
    {
        $product = $this->poductRepository->updateProduct($id, $values);
        return $product;
    }

    public function deleteProduct(string $id): void
    {
        $this->poductRepository->deleteProduct($id);
    }

}