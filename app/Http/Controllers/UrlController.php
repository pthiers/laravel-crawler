<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;
use App\Http\Resources\UrlResource;
use App\Models\Url;

class UrlController extends Controller
{
    public function index()
    {
        return UrlResource::collection(Url::all());
    }

    public function store(UrlRequest $request)
    {
        return new UrlResource(Url::create($request->validated()));
    }

    public function show(Url $url)
    {
        return new UrlResource($url);
    }

    public function update(UrlRequest $request, Url $url)
    {
        $url->update($request->validated());

        return new UrlResource($url);
    }

    public function destroy(Url $url)
    {
        $url->delete();

        return response()->json();
    }
}
