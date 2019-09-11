<?php
namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use App\Interfaces\Service;

class Pages implements Service
{
    private $pageMdl;

    public function __construct(Model $mdl) {
        $this->pageMdl = $mdl;
    }

    public function getList()
    {
        // TODO: Implement getList() method.
    }

    public function getSingleById($id)
    {
        // TODO: Implement getSingleById() method.
    }

    public function create(array $data)
    {
        // TODO: Implement create() method.
    }

    public function update($id, array $data)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
