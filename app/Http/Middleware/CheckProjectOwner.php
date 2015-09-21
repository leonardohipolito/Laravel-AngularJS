<?php

namespace FacilitaProject\Http\Middleware;

use Closure;
use FacilitaProject\Repositories\ProjectRepository;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class CheckProjectOwner
{
    protected $repository;

    /**
     * CheckProjectOwner constructor.
     * @param $repository
     */
    public function __construct(ProjectRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userId = Authorizer::getResourceOwnerId();
        $id = $request->id;
        if($this->repository->isOwner($id,$userId)==false){
            return ['error'=>'Access forbidden'];
        }
        return $next($request);
    }
}
