<?php

namespace App\Repositories;

use App\Models\Cart;

class CartRepository
{
   
    public function addToCart(array $data): Cart
    {
        return Cart::create($data);
    }

    
    public function getUser(int $userId)
    {
        return Cart::where('user_id', $userId)->get();
    }


    public function remove(int $cartId): bool
    {
        $cartItem = Cart::find($cartId);
        return $cartItem ? $cartItem->delete() : false;
    }
}
