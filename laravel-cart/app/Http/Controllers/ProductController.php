<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\Contracts\ProductServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function __construct(
        private ProductServiceInterface $productService,
    )
    {
        //
    }

    public function index(): AnonymousResourceCollection
    {
        $products = $this->productService->getAllProducts();
        return ProductResource::collection($products);
    }

    public function store(ProductStoreRequest $request): ProductResource
    {
        $data = $request->validated();
        $product = $this->productService->createProduct($data);
        return new ProductResource($product);
    }

    public function show(string $id): ProductResource
    {
        $product = $this->productService->findOneProduct($id);
        return new ProductResource($product);
    }

    public function update(ProductUpdateRequest $request, string $id): ProductResource
    {
        $data = $request->validated();
        $product = $this->productService->updateProduct($id, $data);
        return new ProductResource($product);
    }

    public function destroy(string $id): JsonResponse
    {
        $this->productService->deleteProduct($id);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
