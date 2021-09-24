<?php


namespace App\Models;


use App\Http\Contracts\OrderType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tailor extends User implements OrderType
{
    protected $table ='users';

    public function orders(): HasMany
    {
        return $this->HasMany(Order::class,'tailor_id');
    }


    public function medias()
    {
        return $this->hasMany(Media::class,'user_id','id');
    }
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('id', function (Builder $builder) {
            $builder->join('role_user','role_user.user_id','users.id')
                ->where('role_user.role_id',3);
        });
    }


}
