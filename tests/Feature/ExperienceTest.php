<?php

namespace Tests\Feature;

use App\Handlers\ExperienceHandler;
use App\Models\Category;
use App\Models\Company;
use App\Models\Experience;
use App\Models\Location;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExperienceTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $experienceHandlerMock;

    protected function setUp(): void
    {
        parent::setUp();
        $this->experienceHandlerMock = \Mockery::mock(ExperienceHandler::class);
        $this->app->instance(ExperienceHandler::class, $this->experienceHandlerMock);
    }

    public function test_store_experience_successfully()
    {
        $category = Category::factory()->create();
        $location = Location::factory()->create();
        $company = Company::factory()->create();

        $payload = [
            'title' => $this->faker->sentence,
            'category_id' => $category->id,
            'location_id' => $location->id,
            'price' => 100.50,
            'image' => 'image.jpg',
            'format' => 'online',
            'description' => $this->faker->paragraph,
            'company_id' => $company->id,
        ];

        $this->experienceHandlerMock
            ->shouldReceive('create')
            ->once()
            ->with($payload)
            ->andReturn(new Experience($payload));

        $response = $this->postJson(route('experiences.store'), $payload);

        $response->assertStatus(201)
                 ->assertJson([
                     'message' => 'Experiencia creada exitosamente.',
                     'data' => $payload
                 ]);
    }

    public function test_store_experience_validation_error()
    {
        $response = $this->postJson(route('experiences.store'), []);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors([
                     'title', 'category_id', 'location_id', 'price', 'company_id'
                 ]);
    }

    public function test_store_experience_handler_exception()
    {
        $category = Category::factory()->create();
        $location = Location::factory()->create();
        $company = Company::factory()->create();

        $payload = [
            'title' => $this->faker->sentence,
            'category_id' => $category->id,
            'location_id' => $location->id,
            'price' => 100.50,
            'company_id' => $company->id,
        ];

        $this->experienceHandlerMock
            ->shouldReceive('create')
            ->once()
            ->with($payload)
            ->andThrow(new \Exception('Error inesperado'));

        $response = $this->postJson(route('experiences.store'), $payload);

        $response->assertStatus(400)
                 ->assertJson(['error' => 'Error inesperado']);
    }
}