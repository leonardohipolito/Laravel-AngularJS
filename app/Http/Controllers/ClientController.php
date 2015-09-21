<?php

namespace FacilitaProject\Http\Controllers;

use FacilitaProject\Repositories\ClientRepository;
use FacilitaProject\Services\ClientService;
use Illuminate\Http\Request;

use FacilitaProject\Http\Requests;

class ClientController extends Controller
{
    protected $client;
    /**
     * @var ClientService
     */
    private $service;

    /**
     * ClientController constructor.
     * @param ClientRepository $client
     * @param ClientService $service
     */
    public function __construct(ClientRepository $client, ClientService $service)
    {
        $this->client = $client;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return $this->client->all();
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
        return $this->client->find($id);
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
        return $this->client->delete($id);
    }
}
