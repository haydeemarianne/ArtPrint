<?php

namespace App\Repositories;

use App\Models\Experience;

class ExperienceRepository
{
    
    public function getAll()
    {
        return Experience::all();
    }

    
    public function findById(int $id)
    {
        return Experience::find($id);
    }

   
    public function findByCategory(int $categoryId)
    {
        return Experience::where('category_id', $categoryId)->get();
    }

   
    public function create(array $data)
    {
        return Experience::create($data);
    }

    
    public function update(int $id, array $data)
    {
        $experience = $this->findById($id);
        if ($experience) {
            $experience->update($data);
            return $experience;
        }
        return null;
    }

   
    public function delete(int $id)
    {
        $experience = $this->findById($id);
        if ($experience) {
            $experience->delete();
            return true;
        }
        return false;
    }
}
