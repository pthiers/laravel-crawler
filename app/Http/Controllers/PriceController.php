<?php

namespace App\Http\Controllers;

use App\Http\Requests\PriceRequest;
use App\Http\Resources\PriceResource;
use App\Models\Price;

class PriceController extends Controller
{
    public function index()
    {
        return PriceResource::collection(Price::all());
    }

    public function store(PriceRequest $request)
    {
        return new PriceResource(Price::create($request->validated()));
    }

    public function show(Price $price)
    {
        return new PriceResource($price);
    }

    public function update(PriceRequest $request, Price $price)
    {
        $price->update($request->validated());

        return new PriceResource($price);
    }

    public function destroy(Price $price)
    {
        $price->delete();

        return response()->json();
    }
}
