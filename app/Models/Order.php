<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public const STATUS_PROCESSING ='processing';
    public const STATUS_APPROVED ='approved';
    public const STATUS_SHIPPED ='shipped';
    public const STATUS_PAID ='paid';
    public const STATUS_DELIVERED ='delivered';
    use HasFactory;
    protected $fillable =
        [
            'user_id','tailor_id','measurements','fabric_id','feedback','status','amount','is_paid','address'
        ];

    public function fabric()
    {
       return $this->belongsTo(Fabric::class);
    }

    public function tailor()
    {
        return $this->belongsTo(Tailor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
