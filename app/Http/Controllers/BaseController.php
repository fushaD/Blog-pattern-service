<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{

    public function __construct(protected $service, protected $ValidateRequest)
    {
    }

    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 15);
        $cursor = $request->query('cursor', null);

        return app($this->service)->getAll($cursor, $perPage);
    }

    public function show($id)
    {
        $data = app($this->service)->show($id);

        if (!$data) {
            return response()->json(['message' => 'data not found'], 404);
        }

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate($this->ValidateRequest->rules('create'));

        $data = app($this->service)->create($validateData);

        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate($this->ValidateRequest->rules('update'));

        $data = app($this->service)->update($id, $validateData);

        if (!$data) {
            return response()->json(['message' => 'data not found'], 404);
        }

        return response()->json($data);
    }

    public function destroy($id)
    {
        $deleted = app($this->service)->delete($id);

        if (!$deleted) {
            return response()->json(['message' => 'Not found'], 404);
        }

        return response()->json(['message' => 'Deleted successfully'], 204);
    }
}
