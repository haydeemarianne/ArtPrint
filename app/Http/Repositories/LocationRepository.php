<?php
namespace App\Repositories;

use App\Models\Location;

class LocationRepository
{
   
    public function getAll()
    {
        return Location::all();
    }

    public function findById(int $id)
    {
        return Location::find($id);
    }

    public function create(array $data)
    {
        return Location::create($data);
    }

   
    public function update(int $id, array $data)
    {
        $location = $this->findById($id);
        if ($location) {
            $location->update($data);
        }
        return $location;
    }

    public function delete(int $id): bool
    {
        $location = $this->findById($id);
        return $location ? $location->delete() : false;
    }
}
