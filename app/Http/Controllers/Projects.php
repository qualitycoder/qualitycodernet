<?php
namespace App\Http\Controllers;

use App\Interfaces\Service;
use Illuminate\Http\Request;

class Projects extends Controller
{
    public $service;

    public function __construct(Service $projects_svc) {
        $this->service = $projects_svc;
    }

    public function index() {
        return $this->service->getList();
    }

    public function store(Request $request) {
        $this->service->create($request->all());
    }

    public function show($id) {
        return $this->service->getSingleById($id);
    }

    public function update(Request $request, $id) {
        $this->service->update($id, $request->all());
    }

    public function destroy($id) {
        $this->service->delete($id);
    }
}
