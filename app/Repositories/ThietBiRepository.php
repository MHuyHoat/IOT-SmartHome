<?php 
namespace App\Repositories;

use App\Models\ThietBi;
use Illuminate\Support\Arr;

class ThietBiRepository 
{
    private $model;
    public function __construct(ThietBi $model)
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
        if (isset($data['ten'])) $query = $query->where("ten", $data['ten']);
        if (isset($data['trangthai'])) $query = $query->where("trangthai", $data['trangthai']);
        if (isset($data['phuthuoc'])) $query = $query->where("phuthuoc", $data['phuthuoc']);
        if (isset($data['user_id'])) $query = $query->where("user_id", $data['user_id']);
        if (isset($data['with'])) $query = $query->with($data['with']);

        $query = $query->orderBy('id', !empty($data['order']) ? $data['order'] : 'ASC');

        if (!empty($data['paginate'])) return $query->paginate($data['paginate']);
        if (!empty($data['limit'])) $query->limit($data['limit']);
        return $query->get();
    }

    public function find($data)
    {
        $query = $this->model;
        if (isset($data['id'])) $query = $query->where("id", $data['id']);
        if (isset($data['loai'])) $query = $query->where("loai", $data['loai']);
        if (isset($data['ten'])) $query = $query->where("ten", $data['ten']);
        if (isset($data['trangthai'])) $query = $query->where("trangthai", $data['trangthai']);
        if (isset($data['phuthuoc'])) $query = $query->where("phuthuoc", $data['phuthuoc']);
        if (isset($data['user_id'])) $query = $query->where("user_id", $data['user_id']);
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