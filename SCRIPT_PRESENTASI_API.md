# Script Penjelasan Rekaman API - Produk Service API

## 1. OPENING (30 detik)
**"Selamat pagi/siang/sore, perkenalkan nama saya [Nama Anda]. Pada kesempatan kali ini, saya akan mempresentasikan project API yang telah saya buat menggunakan Laravel. API ini adalah Produk Service API yang mengelola data kategori produk, produk, dan transaksi."**

---

## 2. PENGENALAN PROJECT (45 detik)
**"Project ini merupakan RESTful API yang dibangun menggunakan framework Laravel versi 11. API ini memiliki 3 modul utama, yaitu:**

1. **Categories** - untuk mengelola kategori produk
2. **Products** - untuk mengelola data produk beserta stok dan harga
3. **Transactions** - untuk mencatat transaksi penjualan produk

**Semua endpoint menggunakan format JSON dan telah dilengkapi dengan response yang terstruktur untuk memudahkan integrasi dengan aplikasi frontend atau mobile."**

---

## 3. PENJELASAN STRUKTUR DATABASE (1 menit)
**"Mari kita lihat struktur database yang digunakan. Database terdiri dari 3 tabel utama:**

### **Tabel Categories:**
- `id` - Primary Key
- `name` - Nama kategori (unique)
- `timestamps` - created_at dan updated_at

### **Tabel Products:**
- `id` - Primary Key  
- `category_id` - Foreign Key ke tabel categories (nullable)
- `name` - Nama produk
- `description` - Deskripsi produk
- `stock` - Jumlah stok
- `price` - Harga produk
- `status` - Status produk (Available/Out of Stock)
- `timestamps`

### **Tabel Transactions:**
- `id` - Primary Key
- `product_id` - Foreign Key ke tabel products
- `qty` - Jumlah pembelian
- `total_price` - Total harga otomatis dihitung
- `timestamps`

**Relasi antar tabel: Categories memiliki banyak Products, dan Products memiliki banyak Transactions."**

---

## 4. DEMO ENDPOINTS - CATEGORIES (2 menit)
**"Sekarang saya akan demo endpoint Categories. Saya menggunakan Postman untuk testing API."**

### **A. CREATE Category (POST)**
**"Pertama, saya akan membuat kategori baru dengan endpoint POST /api/categories."**

- **Method:** POST
- **URL:** `http://127.0.0.1:8000/api/categories`
- **Headers:** Content-Type: application/json, Accept: application/json
- **Body:**
```json
{
    "name": "Electronics"
}
```

**"Setelah saya send request, API mengembalikan response success dengan status code 201 Created, beserta data kategori yang baru dibuat termasuk ID dan timestamp."**

### **B. GET All Categories**
**"Untuk melihat semua kategori, saya menggunakan method GET."**

- **Method:** GET
- **URL:** `http://127.0.0.1:8000/api/categories`

**"Response menampilkan array berisi semua data kategori yang tersimpan."**

### **C. GET Category by ID**
**"Untuk detail kategori tertentu, saya tambahkan ID di URL."**

- **Method:** GET  
- **URL:** `http://127.0.0.1:8000/api/categories/1`

### **D. UPDATE Category (PUT)**
**"Untuk mengupdate kategori, saya menggunakan method PUT."**

- **Method:** PUT
- **URL:** `http://127.0.0.1:8000/api/categories/1`
- **Body:**
```json
{
    "name": "Electronic Devices"
}
```

### **E. DELETE Category**
**"Dan untuk menghapus kategori, menggunakan method DELETE."**

- **Method:** DELETE
- **URL:** `http://127.0.0.1:8000/api/categories/1`

**"Response mengembalikan message success bahwa kategori telah dihapus."**

---

## 5. DEMO ENDPOINTS - PRODUCTS (3 menit)
**"Sekarang kita lanjut ke endpoint Products yang lebih kompleks."**

### **A. CREATE Product (POST)**
**"Untuk menambah produk baru:"**

- **Method:** POST
- **URL:** `http://127.0.0.1:8000/api/products`
- **Body:**
```json
{
    "category_id": 1,
    "name": "Laptop Gaming ASUS ROG",
    "description": "Laptop gaming dengan processor Intel i7",
    "stock": 15,
    "price": 18500000,
    "status": "Available"
}
```

**"API melakukan validasi otomatis. Misalnya stock harus angka positif, price harus numeric, dan category_id harus ada di database."**

### **B. GET Products dengan Pagination**
**"Endpoint GET products sudah dilengkapi dengan pagination otomatis, 10 data per halaman."**

- **Method:** GET
- **URL:** `http://127.0.0.1:8000/api/products`

**"Response menampilkan data products beserta informasi pagination seperti total data, current page, dan links."**

### **C. SEARCH Products**
**"Ada fitur search untuk mencari produk berdasarkan nama:"**

- **Method:** GET
- **URL:** `http://127.0.0.1:8000/api/products/search?name=laptop`

### **D. FILTER by Status**
**"Kita juga bisa filter produk berdasarkan status:"**

- **Method:** GET
- **URL:** `http://127.0.0.1:8000/api/products?status=Available`

### **E. UPDATE Stock**
**"Fitur khusus untuk update stok produk:"**

- **Method:** PUT
- **URL:** `http://127.0.0.1:8000/api/products/1/stock`
- **Body:**
```json
{
    "stock": 20
}
```

**"Ketika stok diupdate, status produk akan otomatis berubah. Jika stok > 0 menjadi Available, jika stok = 0 menjadi Out of Stock."**

### **F. DELETE Empty Stock Products**
**"Ada endpoint khusus untuk menghapus semua produk dengan stok 0:"**

- **Method:** DELETE
- **URL:** `http://127.0.0.1:8000/api/products/empty-stock`

**"Response menampilkan jumlah produk yang berhasil dihapus."**

---

## 6. DEMO ENDPOINTS - TRANSACTIONS (2 menit)
**"Terakhir, endpoint Transactions untuk mencatat penjualan."**

### **A. CREATE Transaction (POST)**
**"Untuk membuat transaksi baru:"**

- **Method:** POST
- **URL:** `http://127.0.0.1:8000/api/transactions`
- **Body:**
```json
{
    "product_id": 1,
    "qty": 2
}
```

**"Yang menarik di sini, API akan:**
1. Mengecek apakah produk tersedia
2. Mengecek apakah stok mencukupi
3. Menghitung total_price otomatis dari harga produk x qty
4. Mengurangi stok produk otomatis
5. Mengupdate status produk jika stok habis

**Semua proses ini dilakukan dalam satu transaksi database untuk menjaga konsistensi data."**

### **B. GET All Transactions**
**"Untuk melihat riwayat transaksi:"**

- **Method:** GET
- **URL:** `http://127.0.0.1:8000/api/transactions`

**"Response menampilkan semua transaksi dengan informasi produk yang dibeli."**

### **C. GET Transaction by ID**
**"Untuk detail transaksi tertentu:"**

- **Method:** GET
- **URL:** `http://127.0.0.1:8000/api/transactions/1`

---

## 7. FITUR-FITUR PENTING (1 menit)
**"Beberapa fitur penting yang telah diimplementasikan dalam API ini:**

1. **Validasi Input** - Semua input divalidasi sebelum disimpan ke database
2. **Response Terstruktur** - Format JSON yang konsisten dengan status success/error
3. **Error Handling** - Penanganan error seperti data not found (404), validation error (422)
4. **Pagination** - Untuk endpoint yang menampilkan banyak data
5. **Relasi Database** - Menggunakan foreign key dan cascade delete
6. **Business Logic** - Seperti auto-calculate total price, auto-update stock, auto-update status
7. **HTTP Status Code** - Menggunakan status code yang sesuai standar REST (200, 201, 404, 422, dll)

---

## 8. TEKNOLOGI YANG DIGUNAKAN (30 detik)
**"Teknologi yang digunakan dalam project ini:"**

- **Framework:** Laravel 11
- **Database:** MySQL
- **Server:** PHP Built-in Server (php artisan serve)
- **Testing Tool:** Postman
- **Language:** PHP 8.1+

---

## 9. CARA MENJALANKAN PROJECT (45 detik)
**"Untuk menjalankan project ini, langkah-langkahnya:"**

1. **Clone/Download project**
2. **Install dependencies:** `composer install`
3. **Copy .env:** `cp .env.example .env`
4. **Generate key:** `php artisan key:generate`
5. **Setup database** di file .env
6. **Migrate database:** `php artisan migrate`
7. **Run server:** `php artisan serve`
8. **API ready** di `http://127.0.0.1:8000/api`

---

## 10. TESTING & DOKUMENTASI (30 detik)
**"Untuk testing, saya sudah menyiapkan Postman Collection yang berisi semua endpoint beserta contoh request dan response. Collection ini bisa di-import langsung ke Postman untuk memudahkan testing."**

**"Dokumentasi lengkap juga tersedia dalam file README dan API-TROUBLESHOOTING untuk membantu mengatasi masalah yang mungkin terjadi."**

---

## 11. CLOSING (30 detik)
**"Demikian presentasi API yang telah saya buat. API ini siap untuk diintegrasikan dengan aplikasi frontend seperti React, Vue, atau mobile apps seperti Flutter dan React Native."**

**"Terima kasih atas perhatiannya. Jika ada pertanyaan, saya siap menjawab."**

---

## TIPS PRESENTASI:

### **DO:**
✅ Berbicara dengan jelas dan tidak terburu-buru
✅ Tunjukkan setiap endpoint di Postman dengan zoom yang cukup
✅ Baca response JSON yang dikembalikan
✅ Tunjukkan baik success maupun error response
✅ Highlight fitur-fitur unggulan

### **DON'T:**  
❌ Bicara terlalu cepat
❌ Melewatkan penjelasan penting
❌ Tidak menunjukkan demo yang jelas
❌ Mengabaikan error handling

### **DURASI TOTAL:** 10-12 menit

---

## ALTERNATIF SCRIPT SINGKAT (5 MENIT)

Jika waktu terbatas, fokuskan pada:
1. **Opening** (30 detik)
2. **Penjelasan singkat 3 modul** (1 menit)
3. **Demo 1 endpoint lengkap** - CRUD Categories (2 menit)
4. **Demo fitur unggulan** - Create Transaction dengan auto-calculate (1 menit)
5. **Closing** (30 detik)

---

**Good luck dengan presentasinya! 🚀**
