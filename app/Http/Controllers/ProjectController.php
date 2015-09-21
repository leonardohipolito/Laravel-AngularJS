<?php

namespace FacilitaProject\Http\Controllers;

use FacilitaProject\Repositories\ProjectRepository;
use FacilitaProject\Services\ProjectService;
use Illuminate\Http\Request;
use FacilitaProject\Http\Requests;
use Authorizer;
class ProjectController extends Controller
{
    protected $repository;
    protected $service;

    /**
     * ProjectController constructor.
     * @param $repository
     * @param $service
     */
    public function __construct(ProjectRepository $repository, ProjectService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return $this->repository->findWhere(['owner_id'=>Authorizer::getResourceOwnerId()]);
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
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        if($this->checkProjectOwner($id)==false){
            return ['error'=>'Access Forbiden'];
        }
        return $this->repository->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        if($this->checkProjectOwner($id)==false){
            return ['error'=>'Access Forbiden'];
        }
        return $this->service->update($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($this->checkProjectOwner($id)==false){
            return ['error'=>'Access Forbiden'];
        }
        return $this->repository->delete($id);
    }

    private function checkProjectOwner($id){
        $userId = Authorizer::getResourceOwnerId();
        return $this->repository->isOwner($id,$userId);
    }
}
