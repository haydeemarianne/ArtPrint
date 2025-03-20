<?php
namespace App\Http\Controllers;

use App\Handlers\CartHandler;
use Exception;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartHandler;

    public function __construct(CartHandler $cartHandler)
    {
        $this->cartHandler = $cartHandler;
    }

    
    public function store(Request $request)
    {
        try {
            // Validar los datos de entrada
            $validatedData = $request->validate([
                'user_id' => 'required|exists:users,id',
                'experience_id' => 'required|exists:experiences,id',
                'quantity' => 'required|integer|min:1',
            ]);

            $cartItem = $this->cartHandler->addToCart($validatedData);

            return response()->json(['message' => 'Experiencia agregada al carrito.', 'data' => $cartItem], 201);

        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

  
    public function index(Request $request)
    {
        $userId = $request->user()->id;

        $cartItems = $this->cartHandler->getUserCart($userId);

        return response()->json(['data' => $cartItems]);
    }

    public function destroy($cartId)
    {
        $deleted = $this->cartHandler->removeFromCart($cartId);

        if (!$deleted) {
            return response()->json(['error' => 'El elemento del carrito no fue encontrado.'], 404);
        }

        return response()->json(['message' => 'Elemento del carrito eliminado exitosamente.']);
    }
}
