<?php

namespace App\Services;

class BaseService
{
    public function __construct(protected $model)
    {}

    public function create($data)
    {
        return $this->model::create($data);
    }


    public function getAll($cursor = null, $perPage = 15)
    {
        $query = $this->model::orderBy('id');

        // Si un curseur est fourni, commencez à partir de celui-ci
        if ($cursor) {
            $query->where('id', '>', $cursor);
        }

        // Récupérez les data
        return $query->limit($perPage)->get();
    }

    public function show($id)
    {
        return $this->model::find($id);
    }

    public function update($id, $data)
    {
        $updateData = $this->model::find($id);

        if ($updateData) {
            $updateData->update($data);
            return $updateData;
        }

        return null;
    }

    public function delete($id)
    {
        return $this->model::destroy($id);
    }
}
