<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Http\Resources\StoreResource;
use App\Models\Store;

class StoreController extends Controller
{
    public function index()
    {
        return StoreResource::collection(Store::all());
    }

    public function store(StoreRequest $request)
    {
        return new StoreResource(Store::create($request->validated()));
    }

    public function show(Store $store)
    {
        return new StoreResource($store);
    }

    public function update(StoreRequest $request, Store $store)
    {
        $store->update($request->validated());

        return new StoreResource($store);
    }

    public function destroy(Store $store)
    {
        $store->delete();

        return response()->json();
    }
}
