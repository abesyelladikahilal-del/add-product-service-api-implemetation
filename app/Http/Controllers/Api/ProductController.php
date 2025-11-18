<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $q = Product::query();

        if($request->filled('q')){
            $q->where('name','like','%'.$request->q.'%')
              ->orWhere('description','like','%'.$request->q.'%');
        }

        if($request->filled('status')){
            $q->where('status',$request->status);
        }

        $products = $q->latest()->paginate(10);
        return response()->json($products);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'name' => 'required|string',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'status' => 'required|string'
        ]);

        $product = Product::create($data);
        return response()->json(['success'=>true,'message'=>'Produk dibuat','data'=>$product],201);
    }

    public function show($id)
    {
       $p = Product::find($id);
        if(!$p) return response()->json(['success'=>false,'message'=>'Produk tidak ditemukan'],404);
        return response()->json(['success'=>true,'data'=>$p]);
    }

    public function update(Request $request,$id)
    {
        $p = Product::find($id);
        if(!$p) return response()->json(['success'=>false,'message'=>'Produk tidak ditemukan'],404);

        $data = $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'name' => 'sometimes|required|string',
            'description' => 'nullable|string',
            'stock' => 'sometimes|required|integer|min:0',
            'price' => 'sometimes|required|numeric|min:0',
            'status' => 'sometimes|required|string'
        ]);

        $p->update($data);
        return response()->json(['success'=>true,'message'=>'Produk diperbarui','data'=>$p]);
    }

    public function destroy($id)
    {
        $p = Product::find($id);
        if(!$p) return response()->json(['success'=>false,'message'=>'Produk tidak ditemukan'],404);
        $p->delete();
        return response()->json(['success'=>true,'message'=>'Produk dihapus']);
    }

    // tambahan: update stok endpoint sesuai soal
    public function updateStock(Request $request,$id)
    {
        $p = Product::find($id);
        if(!$p) return response()->json(['success'=>false,'message'=>'Produk tidak ditemukan'],404);
        $request->validate(['stock'=>'required|integer|min:0']);
        $p->stock = $request->stock;
        $p->status = $request->stock > 0 ? 'Available' : 'Out of Stock';
        $p->save();
        return response()->json(['success'=>true,'message'=>'Stok diperbarui','data'=>$p]);
    }

    // tambahan: delete all empty-stock
    public function deleteEmptyStock()
    {
        $count = Product::where('stock',0)->delete();
        return response()->json(['success'=>true,'message'=>'Produk stok 0 dihapus','deleted_count'=>$count]);
    }

    // search endpoint (by name)
    public function search(Request $request)
    {
        $name = $request->get('name','');
        $res = Product::where('name','like','%'.$name.'%')->get();
        return response()->json(['success'=>true,'data'=>$res]);
    }
}
