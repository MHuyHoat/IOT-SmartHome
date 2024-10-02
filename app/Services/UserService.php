<?php
namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    public $user_repository;
    public function __construct(
        UserRepository $user_repository
    )
    {
        $this->user_repository = $user_repository;
    }

    public function getData($data){
        $list = $this->user_repository->getData($data);
        return $list;
    }

    public function findById($id){
        return $this->user_repository->findById($id);
    }

    public function find($data){
        return $this->user_repository->find($data);
    }

    public function store($data){
        return $this->user_repository->create($data);
    }

    public function update($id,$data){
        return $this->user_repository->update($id,$data);
    }

    public function delete($id){
        return $this->user_repository->delete($id);
    }
}