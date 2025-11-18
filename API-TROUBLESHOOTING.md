# API POST Troubleshooting Guide

## Most Common Issues:

### 1. Wrong URL
Make sure you're using: `http://localhost/pkl-14-11-25/public/api/categories`
NOT: `http://localhost/api/categories`

### 2. Headers in Postman
Add these headers:
- `Content-Type: application/json`
- `Accept: application/json`

### 3. Request Body (raw JSON)
For Categories POST:
```json
{
    "name": "Electronics"
}
```

For Products POST:
```json
{
    "category_id": 1,
    "name": "Laptop",
    "description": "Gaming laptop",
    "stock": 10,
    "price": 15000000,
    "status": "Available"
}
```

For Transactions POST:
```json
{
    "product_id": 1,
    "qty": 2
}
```

### 4. Database Migration
Run in terminal:
```
cd c:\xampp\pkl-14-11-25
php artisan migrate:fresh
```

### 5. Clear Laravel Cache
```
php artisan config:clear
php artisan route:clear
php artisan cache:clear
```

### 6. Check if Apache/MySQL is running in XAMPP

## Test with cURL (from command line):
```
curl -X POST http://localhost/pkl-14-11-25/public/api/categories -H "Content-Type: application/json" -H "Accept: application/json" -d "{\"name\":\"Test Category\"}"
```
