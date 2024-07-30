<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
	public function index()
	{
		$query = Product::query()
			->allowedFilters(['name', 'price', 'description', 'provider_id'])
			->allowedSorts(['id', 'name', 'price', 'provider_id'])
			->sparseFieldset()
			->jsonPaginate();

		return ProductResource::collection($query);
	}

	public function show(Product $product)
	{
		return ProductResource::make($product);
	}

	public function store(ProductsRequest $request)
	{
		$data = $request->validated();
		$product = Product::create($data);
		return ProductResource::make($product);
	}

	public function update(ProductsRequest $request, Product $product)
	{
		$data = $request->validated();
		$product->update($data);
		return ProductResource::make($product);
	}

	public function destroy(Product $product)
	{
		$product->delete();
		return response()->noContent();
	}
}
