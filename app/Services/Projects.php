<?php
namespace App\Services;

use App\Models\Project as ProjectMdl;
use Illuminate\Support\Facades\Schema;

class Projects
{
    private $projectMdl;

    public function __construct(ProjectMdl $projectMdl) {
        $this->projectMdl = $projectMdl;
    }

    public function getProjectsList() {
        return $this->projectMdl::all();
    }

    public function getSingleProjectById($id) {
        return $this->projectMdl::with('webhooks')
            ->where('id','=', $id)
            ->get();
    }

    public function createProject(array $data) {
        $data = $this->cleanseInput($data);

        $newProject = $this->projectMdl->newInstance($data);
        $newProject->save();
        return $newProject;
    }

    public function updateProject($id, array $data) {
        $data = $this->cleanseInput($data);

        $project = $this->projectMdl->where('id', '=', $id);
        $project->fill($data);
        $project->save();
        return $project;
    }

    public function deleteProject($id) {
        $project = $this->projectMdl->where('id', '=', $id);
        if($project) {
            $project->delete();
        }

        return true;
    }

    private function cleanseInput($data) {

        $columns = Schema::getColumnListing($this->projectMdl->getTable());
        $new_data = [];

        foreach($data as $field => $value) {
            if(in_array($field, $columns)){
                $new_data[$field] = $value;
            }
        }

        return $new_data;
    }
}
