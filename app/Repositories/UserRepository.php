<?php
namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Arr;

class UserRepository 
{
    private $model;
    public function __construct(User $model)
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
        if (isset($data['user_name'])) $query = $query->where("user_name", $data['user_name']);
        if (isset($data['name'])) $query = $query->where("name", $data['name']);
        if (isset($data['email'])) $query = $query->where("email", $data['email']);
        if (isset($data['password'])) $query = $query->where("password", $data['password']);
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
        if (isset($data['user_name'])) $query = $query->where("user_name", $data['user_name']);
        if (isset($data['name'])) $query = $query->where("name", $data['name']);
        if (isset($data['email'])) $query = $query->where("email", $data['email']);
        if (isset($data['password'])) $query = $query->where("password", $data['password']);
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