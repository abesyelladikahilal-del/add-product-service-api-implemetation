# Script Presentasi API - Versi Singkat (5 Menit)

---

## 1. PEMBUKAAN (30 detik)

**"Selamat pagi/siang, nama saya [Nama]. Saya akan presentasikan Produk Service API yang saya buat dengan Laravel. API ini mengelola kategori produk, produk, dan transaksi penjualan."**

---

## 2. PENJELASAN PROJECT (1 menit)

**"API ini punya 3 modul utama:**

**CATEGORIES** - untuk kelola kategori seperti Electronics, Fashion, dll

**PRODUCTS** - untuk kelola produk dengan stok, harga, dan status

**TRANSACTIONS** - untuk catat transaksi penjualan, otomatis kurangi stok

**Semua pakai format JSON dan siap dipakai untuk frontend atau mobile app."**

---

## 3. DEMO CATEGORIES - CRUD LENGKAP (2 menit)

**"Saya demo pakai Postman ya."**

### A. CREATE (POST)
**"Pertama, buat kategori baru."**
- URL: `http://127.0.0.1:8000/api/categories`
- Method: POST
- Body: `{"name": "Electronics"}`

**"Klik Send... dapat response success code 201 dengan data kategori baru."**

### B. GET ALL
**"Lihat semua kategori."**
- URL: `http://127.0.0.1:8000/api/categories`
- Method: GET

**"Response tampil semua data kategori yang ada."**

### C. UPDATE (PUT)
**"Update nama kategori."**
- URL: `http://127.0.0.1:8000/api/categories/1`
- Method: PUT
- Body: `{"name": "Electronic Devices"}`

**"Data berhasil diupdate."**

### D. DELETE
**"Hapus kategori."**
- URL: `http://127.0.0.1:8000/api/categories/1`
- Method: DELETE

**"Response success, kategori terhapus."**

---

## 4. DEMO FITUR UNGGULAN - TRANSAKSI (1 menit)

**"Sekarang fitur favorit saya, transaksi otomatis."**

**"Misalnya ada produk Laptop harga 15 juta, stok 10 pcs."**

**"Saya buat transaksi beli 2 pcs:"**
- URL: `http://127.0.0.1:8000/api/transactions`
- Method: POST
- Body: `{"product_id": 1, "qty": 2}`

**"Klik Send... lihat yang terjadi:**
- ✅ Total harga otomatis dihitung 30 juta (15jt x 2)
- ✅ Stok produk otomatis berkurang jadi 8
- ✅ Kalau stok habis, status berubah Out of Stock

**Semua otomatis dalam satu request!"**

---

## 5. PENUTUP (30 detik)

**"Jadi API ini:**
- Punya validasi otomatis
- Response konsisten pakai JSON
- Ada error handling
- Pakai relasi database
- Siap integrasi dengan aplikasi lain

**Terima kasih. Ada pertanyaan?"**

---

## CHEAT SHEET - YANG HARUS DITUNJUKKAN:

### ✅ WAJIB TUNJUKKAN:
1. Buka Postman dengan jelas
2. Tunjuk Header: Content-Type dan Accept
3. Tunjuk Body JSON
4. Klik tombol Send
5. Baca response yang muncul (status code + data)

### 💡 TIPS CEPAT:
- Bicara sambil aksi (jangan diam lama)
- Zoom Postman biar jelas
- Kalau ada error, bilang "ini contoh error handling"
- Senyum & percaya diri

### ⏱️ TIME MANAGEMENT:
- 0:00-0:30 → Pembukaan
- 0:30-1:30 → Penjelasan
- 1:30-3:30 → Demo CRUD  
- 3:30-4:30 → Demo Transaksi
- 4:30-5:00 → Penutup

**GOOD LUCK! 🚀**
