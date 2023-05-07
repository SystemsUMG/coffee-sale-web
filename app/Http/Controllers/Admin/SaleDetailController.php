<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SaleDetail;
use Illuminate\Http\Request;

class SaleDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $details = SaleDetail::where('sale_id', $request->sale_id)->get();
        $response = [];
        foreach ($details as $detail)
        {
            $response[] = [
                'product'   => $detail->product->name,
                'amount'    => $detail->amount,
                'price'     => $detail->product->price,
                'subtotal'  => $detail->product->price * $detail->amount,
            ];
        }
        $this->response = [
            'recordsTotal'    => count($response),
            'recordsFiltered' => count($response),
            'data'            => $response,
        ];
        return response()->json($this->response);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
