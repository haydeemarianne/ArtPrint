<?php
namespace App\Http\Controllers;

use App\Handlers\ExperienceHandler;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    protected $experienceHandler;

    public function __construct(ExperienceHandler $experienceHandler)
    {
        $this->experienceHandler = $experienceHandler;
    }
    
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'location_id' => 'required|exists:locations,id',
                'price' => 'required|numeric',
                'image' => 'nullable|string',
                'format' => 'nullable|string',
                'description' => 'nullable|string',
                'company_id' => 'required|exists:companies,id',
            ]);

            $experience = $this->experienceHandler->create($validatedData);

            return response()->json(['message' => 'Experiencia creada exitosamente.', 'data' => $experience], 201);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
