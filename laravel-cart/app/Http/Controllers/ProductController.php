<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function __construct(
        private Product $model,
    )
    {
        //
    }

    public function index(): AnonymousResourceCollection
    {
        $products = $this->model->all();
        return ProductResource::collection($products);
    }

    public function store(ProductStoreRequest $request): ProductResource
    {
        $product = $request->validated();
        dd($product);
        $this->model->create($product);
        return new ProductResource($product);
    }

    public function show(string $id): ProductResource
    {
        $product = $this->model->findOrFail($id);
        return new ProductResource($product);
    }

    public function update(ProductUpdateRequest $request, string $id): ProductResource
    {
        $product = $this->model->findOrFail($id);
        $data = $request->all();
        $product->update($data);
        return new ProductResource($product);
    }

    public function destroy(string $id): JsonResponse
    {
        $product = $this->model->findOrFail($id);
        $product->delete();
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
