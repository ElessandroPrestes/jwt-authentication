<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMarvelRequest;
use App\Http\Requests\UpdateMarvelRequest;
use App\Http\Resources\MarvelResource;
use Illuminate\Http\Request;
use App\Models\Marvel;
use App\Repositories\MarvelRepositoryInterface;

class MarvelController extends Controller
{

    public function __construct(
        protected MarvelRepositoryInterface $repository
    )
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marvels = $this->repository->findAll();

        return response([
            'data' => MarvelResource::collection($marvels),
            'message' => 'Marvel Successfully listed'
        ], 200);
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMarvelRequest $request)
    {
        $marvel = $this->repository->store($request->validated());

        return response([
            'data'=>new MarvelResource($marvel),
            'message' => 'Register successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     * @param string $uuid
     */
    public function show($uuid)
    {
         $marvel = $this->repository->findByUuid($uuid);

         return response(['data'=>new MarvelResource($marvel),
         'message' => 'Marvel Successfully listed'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *@param string $uuid
     */
    public function update(UpdateMarvelRequest $request, $uuid)
    {
        $marvel = $this->repository->update($uuid, $request->validated());

        return response([
            'data'=>new MarvelResource($marvel),
            'message' => 'Updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param string $uuid
     */
    public function destroy($uuid)
    {
        $this->repository->destroy($uuid);

        return response()->json(['message' => 'Deleted'], 204);
    }
}
