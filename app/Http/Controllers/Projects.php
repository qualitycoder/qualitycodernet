<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Projects as ProjectSvc;

class Projects extends Controller
{
    public $service;

    public function __construct(ProjectSvc $projects_svc) {
        $this->service = $projects_svc;
    }

    public function index() {
        return $this->service->getProjectsList();
    }

    public function store(Request $request) {
        return $this->service->createProject($request->all());
    }

    public function show($id) {
        return $this->service->getSingleProjectById($id);
    }

    public function update(Request $request, $id) {
        return $this->service->updateProject($id, $request->all());
    }

    public function destroy($id) {
        return $this->service->deleteProject($id);
    }
}
