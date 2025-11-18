<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['product_id','qty','total','purchased_at'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
