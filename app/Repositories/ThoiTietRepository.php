<?php
namespace App\Repositories;

use App\Models\ThoiTiet;
use Illuminate\Support\Arr;

class ThoiTietRepository 
{
    private $model;
    public function __construct(ThoiTiet $model)
    {
        $this->model = $model;
    }

    public function findById($_id)
    {
        return $this->model->where('id', $_id)->first();
    }

    public function getData($data)
    {
        $query = $this->model;
        if (isset($data['id'])) $query = $query->where("id", $data['id']);
        if (isset($data['loai'])) $query = $query->where("loai", $data['loai']);
        if (isset($data['noiDung'])) $query = $query->where("noiDung", $data['noiDung']);
        if (isset($data['thietbi_id'])) $query = $query->where("thietbi_id", $data['thietbi_id']);
        if (isset($data['with'])) $query = $query->with($data['with']);

        $query = $query->orderBy('id', !empty($data['order']) ? $data['order'] : 'DESC');

        if (!empty($data['paginate'])) return $query->paginate($data['paginate']);
        if (!empty($data['limit'])) $query->limit($data['limit']);
        return $query->get();
    }

    public function find($data)
    {
        $query = $this->model;
        if (isset($data['id'])) $query = $query->where("id", $data['id']);
        if (isset($data['loai'])) $query = $query->where("loai", $data['loai']);
        if (isset($data['noiDung'])) $query = $query->where("noiDung", $data['noiDung']);
        if (isset($data['thietbi_id'])) $query = $query->where("thietbi_id", $data['thietbi_id']);
        if (isset($data['with'])) $query = $query->with($data['with']);
        return $query->first();
    }

    public function update($_id, $_data)
    {
        $data = Arr::only($_data, $this->model->fillable);
        return $this->model->where('id', $_id)->update($data);
    }

    public function create($_data)
    {
        $data = Arr::only($_data, $this->model->fillable);
        return $this->model->create($data);
    }

    public function delete($data)
    {
        return $this->model->where('id', $data['id'])->delete();
    }
}