<?php

namespace Tests\Feature;

use App\Handlers\CartHandler;
use App\Models\Cart;
use App\Models\Experience;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CartControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $cartHandlerMock;
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->cartHandlerMock = \Mockery::mock(CartHandler::class);
        $this->app->instance(CartHandler::class, $this->cartHandlerMock);

        $this->user = User::factory()->create();
    }

    public function test_store_cart_item_successfully()
    {
        $experience = Experience::factory()->create();

        $payload = [
            'user_id' => $this->user->id,
            'experience_id' => $experience->id,
            'quantity' => 2,
        ];

        $cartItem = new Cart($payload);

        $this->cartHandlerMock
            ->shouldReceive('addToCart')
            ->once()
            ->with($payload)
            ->andReturn($cartItem);

        $response = $this->postJson(route('cart.store'), $payload);

        $response->assertStatus(201)
                 ->assertJson([
                     'message' => 'Experiencia agregada al carrito.',
                     'data' => $payload
                 ]);
    }

    public function test_store_cart_item_validation_error()
    {
        $response = $this->postJson(route('cart.store'), []);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors([
                     'user_id', 'experience_id', 'quantity'
                 ]);
    }

    public function test_store_cart_item_handler_exception()
    {
        $experience = Experience::factory()->create();

        $payload = [
            'user_id' => $this->user->id,
            'experience_id' => $experience->id,
            'quantity' => 1,
        ];

        $this->cartHandlerMock
            ->shouldReceive('addToCart')
            ->once()
            ->with($payload)
            ->andThrow(new \Exception('Error inesperado'));

        $response = $this->postJson(route('cart.store'), $payload);

        $response->assertStatus(400)
                 ->assertJson(['error' => 'Error inesperado']);
    }

    public function test_index_cart_items()
    {
        $cartItems = Cart::factory()->count(2)->create(['user_id' => $this->user->id]);

        $this->cartHandlerMock
            ->shouldReceive('getUserCart')
            ->once()
            ->with($this->user->id)
            ->andReturn($cartItems);

        $response = $this->actingAs($this->user)->getJson(route('cart.index'));

        $response->assertStatus(200)
                 ->assertJson(['data' => $cartItems->toArray()]);
    }

    public function test_destroy_cart_item_successfully()
    {
        $cartItem = Cart::factory()->create();

        $this->cartHandlerMock
            ->shouldReceive('removeFromCart')
            ->once()
            ->with($cartItem->id)
            ->andReturn(true);

        $response = $this->deleteJson(route('cart.destroy', $cartItem->id));

        $response->assertStatus(200)
                 ->assertJson(['message' => 'Elemento del carrito eliminado exitosamente.']);
    }

    public function test_destroy_cart_item_not_found()
    {
        $this->cartHandlerMock
            ->shouldReceive('removeFromCart')
            ->once()
            ->with(999)
            ->andReturn(false);

        $response = $this->deleteJson(route('cart.destroy', 999));

        $response->assertStatus(404)
                 ->assertJson(['error' => 'El elemento del carrito no fue encontrado.']);
    }
}
