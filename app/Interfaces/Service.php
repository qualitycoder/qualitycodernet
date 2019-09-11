<?php
namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface Service
{
    public function __construct(Model $mdl);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}
