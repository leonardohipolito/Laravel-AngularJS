<?php

namespace FacilitaProject\Http\Controllers;

use FacilitaProject\Repositories\ProjectNoteRepository;
use FacilitaProject\Services\ProjectService;
use Illuminate\Http\Request;

use FacilitaProject\Http\Requests;
use FacilitaProject\Http\Controllers\Controller;

class ProjectNoteController extends Controller
{
    protected $repository;
    protected $service;

    /**
     * ProjectNoteController constructor.
     * @param $repository
     * @param $service
     */
    public function __construct(ProjectNoteRepository $repository, ProjectService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return Response
     */
    public function index($id)
    {
        return $this->repository->findWhere(['project_id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param $noteId
     * @return Response
     */
    public function show($id,$noteId)
    {
        return $this->repository->findWhere(['project_id'=>$id,'id'=>$noteId]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @param $noteID
     * @return Response
     */
    public function update(Request $request, $id, $noteID)
    {
        return $this->service->update($request->all(),$noteID);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id,$noteID)
    {
        return $this->repository->delete($noteID);
    }
}
