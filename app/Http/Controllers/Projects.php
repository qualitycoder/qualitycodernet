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
        $deleted = $this->service->deleteProject($id);
        $return['message'] = "Project deleted successfully";

        if(!$deleted){
            $return['message'] = "There was a problem deleting the project. Please try again later";
        }

        return json_encode($return);
    }
}
