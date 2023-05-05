<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display the view of the resource.
     */
    public function index()
    {
        return view('admin.products.index');
    }

    /**
     * Return a listing of the resource.
     */
    public function list(Request $request)
    {
        $products = Product::whereRaw(true);
        $this->response = $this->listData($request, $products);
        return response()->json($this->response);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        try {
            $validate = $request->validated();
            $product = Product::create($validate);
            $product->images()->create([
                'url' => $request->file('cover_photo')->store('images', 'public'),
                'type' => 1,
            ]);
            foreach ($request->photos as $photo) {
                $product->images()->create([
                    'url' => $photo->store('images', 'public'),
                    'type' => 2,
                ]);
            }
            $this->response_type = 'success';
            $this->message = 'Se ha creado el producto';
        } catch (\Exception $exception) {
            $this->message = $exception->getMessage();
        }
        return redirect()->back()->with($this->response_type, $this->message);
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with('images')->find($id);
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function images(Request $request, Product $product)
    {
        try{
            $name = $request->file('file')->getClientOriginalName();
            $product->images()->create([
                'url'   => $request->file('file')->storeAs('images', $name, 'public'),
                'type'  => $request->type
            ]);
            return response()->json('Éxito');
        }catch (\Exception $exception) {
            return response()->json($exception->getMessage(), 500);
        }
    }

    public function deleteImages(Request $request)
    {
        try{
            $url = Image::where('url', 'images/'.$request->name)->get();
            if (count($url) == 1) {
                Storage::disk('public')->delete('images/'.$request->name);
            }
            $product = Product::where('id', $request->id)->first();
            $image = $product->images()->where('url', 'images/'.$request->name)->first();
            $image->delete();
            return response()->json('Éxito');
        }catch (\Exception $exception) {
            return response()->json($exception->getMessage(), 500);
        }
    }
    public function showImages(Request $request, Product $id): JsonResponse
    {
        $images = $id->images()->where('type', $request->type)->get();
        $contents = [];
        if (count($images) > 0) {
            foreach ($images as $image) {
                $contents[] = [
                    'name'  => basename($image->url),
                    'size'  => Storage::disk('public')->size($image->url),
                    'route' => asset(Storage::url($image->url)),
                ];
            }
            return response()->json($contents);
        } else {
            return response()->json($contents, 500);
        }
    }
}
