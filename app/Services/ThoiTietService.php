<?php  

namespace App\Services;

use App\Repositories\ThoiTietRepository;

class ThoiTietService
{
    public $thoitiet_repository;
    public function __construct(
        ThoiTietRepository $thoitiet_repository
    )
    {
        $this->thoitiet_repository = $thoitiet_repository;
    }

    public function getData($data){
        $list = $this->thoitiet_repository->getData($data);
        return $list;
    }

    public function findById($id){
        return $this->thoitiet_repository->findById($id);
    }

    public function find($data){
        return $this->thoitiet_repository->find($data);
    }

    public function store($data){
        return $this->thoitiet_repository->create($data);
    }

    public function update($id,$data){
        return $this->thoitiet_repository->update($id,$data);
    }

    public function delete($id){
        return $this->thoitiet_repository->delete($id);
    }
}