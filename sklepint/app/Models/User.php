<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Cart;
use App\Models\CartItem;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    const ROLE_USER = 'user';
    const ROLE_ADMIN = 'admin';

    // ...

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', 
    ];

    protected $dates = [
        'email_verified_at',
    ];
  
    public function isAdmin()
    {
        return $this->is_admin == 1;
    }
    
    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function cartItems()
    {
        return $this->hasManyThrough(CartItem::class, Cart::class);
    }
 
}
