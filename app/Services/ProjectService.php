<?php
/**
 * Created by PhpStorm.
 * User: leonardo
 * Date: 11/09/15
 * Time: 21:28
 */

namespace FacilitaProject\Services;
use FacilitaProject\Repositories\ClientRepository;
use FacilitaProject\Repositories\ProjectRepository;
use FacilitaProject\Validators\ClientValidator;
use FacilitaProject\Validators\ProjectValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectService{
    /**
     * @var ClientRepository
     */
    protected $repository;
    /**
     * @var ClientValidator
     */
    private $validator;

    /**
     * @param ProjectRepository $repository
     * @param ProjectValidator $validator
     */
    public function __construct(ProjectRepository $repository, ProjectValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    /**
     * @param array $data
     * @return array|mixed
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function create(array $data){
        try{
            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);
        }catch (ValidatorException $e){
            return [
                'error'=>true,
                'message'=>$e->getMessageBag()
            ];
        }
    }

    /**
     * @param array $data
     * @param $id
     * @return array|mixed
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(array $data, $id){
        try{
            $this->validator->with($data)->passesOrFail();
            return $this->repository->update($data, $id);
        }catch (ValidatorException $e){
            return [
                'error'=>true,
                'message'=>$e->getMessageBag()
            ];
        }
    }
}