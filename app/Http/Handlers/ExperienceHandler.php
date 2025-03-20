<?php
namespace App\Handlers;

use App\Repositories\ExperienceRepository;
use Exception;

class ExperienceHandler
{
    protected $experienceRepository;

    public function __construct(ExperienceRepository $experienceRepository)
    {
        $this->experienceRepository = $experienceRepository;
    }

   
    public function create(array $data)
    {
         $missingFields = array_diff(['title', 'category_id', 'location_id', 'price', 'company_id'], array_keys($data));
    
    if (!empty($missingFields)) {
        throw new Exception('Faltan los siguientes campos obligatorios: ' . implode(', ', $missingFields));
    }
        return $this->experienceRepository->create($data);
    }
}