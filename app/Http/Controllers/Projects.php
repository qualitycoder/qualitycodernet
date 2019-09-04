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
        //
    }

    public function show($id) {
        return $this->service->getSingleProjectById($id);
    }

    public function update(Request $request, $id) {
        //
    }

    public function destroy($id) {
        //
    }
}
