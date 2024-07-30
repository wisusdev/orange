<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProvidersRequest;
use App\Http\Resources\ProviderResource;
use App\Models\Provider;
use Illuminate\Http\Response;
use Illuminate\Http\Resources\Json\JsonResource;

class ProviderController extends Controller
{
	public function index(): JsonResource
	{
		$query = Provider::query()
			->allowedFilters(['name', 'address', 'phone', 'description'])
			->allowedSorts(['id', 'name', 'address', 'phone'])
			->sparseFieldset()
			->jsonPaginate();

		return ProviderResource::collection($query);
	}

	public function show(Provider $provider): ProviderResource
	{
		return ProviderResource::make($provider);
	}

	public function store(ProvidersRequest $request): ProviderResource
	{
		$data = $request->validated();

		$provider = Provider::create($data);
		return ProviderResource::make($provider);
	}

	public function update(ProvidersRequest $request, Provider $provider): ProviderResource
	{
		$data = $request->validated();
		$provider->update($data);
		return ProviderResource::make($provider);
	}

	public function destroy(Provider $provider): Response
	{
		$provider->delete();
		return response()->noContent();
	}
}