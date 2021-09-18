<?php


namespace App\Http\Contracts;
use Illuminate\Database\Eloquent\Relations\HasMany;


interface OrderType
{
    public function orders(): HasMany;
}
