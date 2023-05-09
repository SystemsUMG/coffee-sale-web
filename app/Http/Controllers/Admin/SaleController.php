<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuses = $this->statuses();
        return view('admin.sales.index', compact('statuses'));
    }

    public function listSales(Request $request)
    {
        $sales = Sale::whereRaw(true);
        $this->response = $this->listData($request, $sales);
        $sales = $this->response['data'];
        $data = [];
        foreach ($sales as $sale)
        {
            $data[] = [
                'id' => $sale->id,
                'customer' => $sale->customer->name,
                'amount' => 'Q.'.$sale->amount_paid,
                'status' => $this->statuses()[$sale->status] ?? 'Indefinido',
                'paid_type' => $this->payment_types[$sale->payment_type] ?? 'Indefinido',
                'transaction_number' => $sale->transaction_number,
                'date' => Carbon::parse($sale->created_at)->format('d/m/Y h:i A'),
            ];
        }
        $response = [
            'recordsTotal'    => $this->response['recordsTotal'],
            'recordsFiltered' => $this->response['recordsFiltered'],
            'data'            => $data,
        ];
        return response()->json($response);
    }

    public function tracking(Request $request)
    {
        $sale = Sale::find($request->sale_id);
        $data = [];
        foreach (json_decode($sale->tracking) as $key => $tracking) {
            $data[] = [
                'status' => $key,
                'date' => Carbon::parse($tracking)->format('d/m/y  H:i A') ,
                'icon' => $this->statuses()[$key] ?? 'Indefinido',
            ];
        }
        $this->response = [
            'sale_id' => $sale->id,
            'status' => $sale->status,
            'tracking' => $data,
        ];
        return response()->json($this->response);
    }

    public function updateTracking(Sale $sale, Request $request)
    {
        $this->updateStatus($sale, $request->status);
        return back()->with('success', 'Estado actualizado');
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
