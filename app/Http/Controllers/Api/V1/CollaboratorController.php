<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreCollaboratorRequest;
use App\Http\Requests\V1\UpdateCollaboratorRequest;
use App\Http\Resources\V1\CollaboratorCollection;
use App\Http\Resources\V1\CollaboratorResource;
use App\Models\Collaborator;
use Illuminate\Http\Request;

class CollaboratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Collaborator::query();

        // Si la opción "details" está presente,
        // se procede a mostrar los detalles de las claves foraneas.
        // Esto trabaja en conjunto con CollaboratorResource.
        if ($request->query('details')) {
            $query->with('team');
            $query->with('country');
        }

        return new CollaboratorCollection($query->paginate(15));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCollaboratorRequest $request)
    {
        return new CollaboratorResource(Collaborator::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Collaborator $collaborator, Request $request)
    {
        $query = Collaborator::query();

        // Si la opción "details" está presente,
        // se procede a mostrar los detalles de las claves foraneas.
        // Esto trabaja en conjunto con CollaboratorResource.
        if ($request->query('details')) {
            $query->with('team');
            $query->with('country');
        }

        return new CollaboratorResource($query->first());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCollaboratorRequest $request, Collaborator $collaborator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collaborator $collaborator)
    {
        //
    }
}
