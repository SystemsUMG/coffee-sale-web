<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.products.index');
    }

    public function list(Request $request)
    {
        $server_side = $this->serverSideParameters($request);
        $data = Product::whereRaw(true);
        $recordsTotal = $data->count();
        $filtered = $data->search($server_side['search'])->orderBy($server_side['order_val'], $server_side['dir_val']);
        $recordsFiltered = $filtered->count();
        $filtered_data = $filtered->offset($server_side['start_val'])->limit($server_side['limit_val'])->get();
        $this->response = [
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $filtered_data,
        ];
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
}
