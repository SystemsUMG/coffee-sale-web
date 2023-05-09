<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Auth::user()->sales()->with('sale_details.product.images')->get();
        return response()->json($sales);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                'user_id' => ['required', 'integer', 'exists:users,id'],
                'transaction_number' => ['required', 'string'],
                'payment_type' => ['required', 'integer'],
                'items' => ['required', 'array'],
                'date_generated' => ['required', 'date_format:Y-m-d H:i:s'],
            ]);
            DB::beginTransaction();
            $validate['status'] = 1;
            $validate['amount_paid'] = 0;
            $validate['tracking'] = json_encode([$validate['date_generated']]);
            $sale = Sale::create($validate);
            $this->updateStatus($sale,1);
            $amount_paid = 0;
            foreach ($validate['items'] as $item) {
                $product = Product::find($item['id']);
                if ($product) {
                    $sale->sale_details()->create([
                        'product_id' => $item['id'],
                        'amount' => $item['amount'],
                    ]);
                    $amount_paid += $product->price * $item['amount'];
                }
            }
            $sale->amount_paid = $amount_paid;
            $sale->save();
            DB::commit();
            $this->message = 'Se ha generado tu pedido correctamente';
            $this->status_code = 200;
        } catch (\Exception $exception) {
            DB::rollBack();
            $this->message = $exception->getMessage();
            $this->status_code = 500;
        }
        $this->response = [
            'message' => $this->message
        ];
        return response()->json($this->response, $this->status_code);
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
