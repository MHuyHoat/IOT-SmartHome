<?php  

namespace App\Services;

use App\Repositories\ThietBiRepository;

class ThietBiService
{
    public $thietbi_repository;
    public function __construct(
        ThietBiRepository $thietbi_repository
    )
    {
        $this->thietbi_repository = $thietbi_repository;
    }

    public function getData($data){
        $list = $this->thietbi_repository->getData($data);
        return $list;
    }

    public function findById($id){
        return $this->thietbi_repository->findById($id);
    }

    public function find($data){
        return $this->thietbi_repository->find($data);
    }

    public function store($data){
        return $this->thietbi_repository->create($data);
    }

    public function update($id,$data){
        return $this->thietbi_repository->update($id,$data);
    }

    public function delete($id){
        return $this->thietbi_repository->delete($id);
    }
}