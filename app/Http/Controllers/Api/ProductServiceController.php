<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductServiceController extends Controller
{
    // 1. Tambah kategori
    public function createCategory(Request $request)
    {
        return response()->json([
            "success" => true,
            "message" => "Kategori berhasil dibuat",
            "data" => [
                "id" => 1,
                "name" => $request->name
            ]
        ]);
    }

    // 2. Daftar transaksi pembelian
    public function getTransactions()
    {
        return response()->json([
            "success" => true,
            "data" => [
                [
                    "id" => 10,
                    "product" => "Laptop Asus",
                    "qty" => 1,
                    "total" => 8500000,
                    "date" => "2025-11-17"
                ],
                [
                    "id" => 11,
                    "product" => "Mouse Logitech",
                    "qty" => 2,
                    "total" => 300000,
                    "date" => "2025-11-17"
                ]
            ]
        ]);
    }

    // 3. Update stok produk
    public function updateStock(Request $request, $id)
    {
        if ($id != 1) {
            return response()->json([
                "success" => false,
                "message" => "Produk tidak ditemukan"
            ], 404);
        }

        return response()->json([
            "success" => true,
            "message" => "Stok berhasil diperbarui",
            "data" => [
                "id" => $id,
                "stock" => $request->stock
            ]
        ]);
    }

    // 4. Hapus produk dengan stok 0
    public function deleteEmptyStock()
    {
        return response()->json([
            "success" => true,
            "message" => "Semua produk dengan stok 0 telah dihapus",
            "deleted_count" => 5
        ]);
    }

    // 5. Cari produk berdasarkan nama
    public function searchProduct(Request $request)
    {
        $name = $request->name;

        return response()->json([
            "success" => true,
            "data" => [
                [
                    "id" => 1,
                    "name" => "Laptop Asus",
                    "stock" => 5,
                    "price" => 8500000
                ],
                [
                    "id" => 2,
                    "name" => "Laptop Lenovo",
                    "stock" => 3,
                    "price" => 7500000
                ]
            ]
        ]);
    }
}
