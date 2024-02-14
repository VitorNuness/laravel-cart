<?php

namespace App\Http\Controllers;

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
        return $products;
    }

    public function store(Request $request)
    {
        $product = $request->all();
        $this->model->create($product);
        return $product;
    }

    public function show(string $id)
    {
        $product = $this->model->findOrFail($id);
        return $product;
    }

    public function update(Request $request, string $id)
    {
        $product = $this->model->findOrFail($id);
        $data = $request->all();
        $product->update($data);
        return $product;
    }

    public function destroy(string $id)
    {
        $product = $this->model->findOrFail($id);
        $product->delete();
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
