<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function __construct(
        private Product $model,
    )
    {
        //
    }

    public function index()
    {
        $products = $this->model->all();
        return ProductResource::collection($products);
    }

    public function store(Request $request)
    {
        $product = $request->all();
        $this->model->create($product);
        return new ProductResource($product);
    }

    public function show(string $id)
    {
        $product = $this->model->findOrFail($id);
        return new ProductResource($product);
    }

    public function update(Request $request, string $id)
    {
        $product = $this->model->findOrFail($id);
        $data = $request->all();
        $product->update($data);
        return new ProductResource($product);
    }

    public function destroy(string $id)
    {
        $product = $this->model->findOrFail($id);
        $product->delete();
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
