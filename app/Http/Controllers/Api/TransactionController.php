<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;

class TransactionController extends Controller
{
    public function index()
    {
        $tx = Transaction::with('product')->latest()->paginate(20);
        return response()->json($tx);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id'=>'required|exists:products,id',
            'qty'=>'required|integer|min:1',
        ]);

        $product = Product::find($data['product_id']);
        if($product->stock < $data['qty']){
            return response()->json(['success'=>false,'message'=>'Stok tidak cukup'],400);
        }

        $total = $product->price * $data['qty'];

        // buat transaction
        $tx = Transaction::create([
            'product_id'=>$product->id,
            'qty'=>$data['qty'],
            'total'=>$total,
            'purchased_at'=>now()
        ]);

        // kurangi stok
        $product->stock -= $data['qty'];
        $product->status = $product->stock > 0 ? 'Available' : 'Out of Stock';
        $product->save();

        return response()->json(['success'=>true,'message'=>'Transaksi berhasil','data'=>$tx],201);
    }

    public function show($id)
    {
        $tx = Transaction::with('product')->find($id);
        if(!$tx) return response()->json(['success'=>false,'message'=>'Transaksi tidak ditemukan'],404);
        return response()->json(['success'=>true,'data'=>$tx]);
    }
}
