<?php
namespace App\Handlers;

use App\Repositories\CartRepository;
use Exception;

class CartHandler
{
    protected $cartRepository;

    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

   
    public function addToCart(array $data)
    {
        // Valido campos obligatorios
        $requiredKeys = ['user_id', 'experience_id', 'quantity'];
        $missingFields = array_diff($requiredKeys, array_keys($data));

        if (!empty($missingFields)) {
            throw new Exception('Faltan los siguientes campos obligatorios: ' . implode(', ', $missingFields));
        }

        // Llamar al repositorio para crear el registro
        return $this->cartRepository->addToCart($data);
    }

    
    public function getUserCart(int $userId)
    {
        return $this->cartRepository->getUserCart($userId);
    }

    
    public function removeFromCart(int $cartId)
    {
        return $this->cartRepository->remove($cartId);
    }
}
