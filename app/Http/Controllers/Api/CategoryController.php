<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json(['success'=>true,'data'=>Category::all()]);
    }

    public function store(Request $request)
    {
        $request->validate(['name'=>'required|string|unique:categories,name']);
        $cat = Category::create($request->only('name'));
        return response()->json(['success'=>true,'message'=>'Kategori dibuat','data'=>$cat],201);
    }

    public function show($id)
    {
        $cat = Category::find($id);
        if(!$cat) return response()->json(['success'=>false,'message'=>'Kategori tidak ditemukan'],404);
        return response()->json(['success'=>true,'data'=>$cat]);
    }

    public function update(Request $request,$id)
    {
        $cat = Category::find($id);
        if(!$cat) return response()->json(['success'=>false,'message'=>'Kategori tidak ditemukan'],404);
        $request->validate(['name'=>'required|string|unique:categories,name,'.$id]);
        $cat->update($request->only('name'));
        return response()->json(['success'=>true,'message'=>'Kategori diperbarui','data'=>$cat]);
    }

    public function destroy($id)
    {
        $cat = Category::find($id);
        if(!$cat) return response()->json(['success'=>false,'message'=>'Kategori tidak ditemukan'],404);
        $cat->delete();
        return response()->json(['success'=>true,'message'=>'Kategori dihapus']);
    }
}
