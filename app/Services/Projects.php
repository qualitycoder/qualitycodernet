<?php
namespace App\Services;

use App\Interfaces\Listable;
use App\Interfaces\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;


class Projects implements Service, Listable
{
    private $projectMdl;

    public function __construct(Model $mdl) {
        $this->projectMdl = $mdl;
    }

    public function getList() {
        return $this->projectMdl::all();
    }

    public function getSingleById($id) {
        return $this->projectMdl::with('webhooks')
            ->where('id','=', $id)
            ->first();
    }

    public function create(array $data) {
        $data = $this->cleanseInput($data);

        $newProject = $this->projectMdl->newInstance($data);
        $newProject->save();
    }

    public function update($id, array $data) {
        $data = $this->cleanseInput($data);

        $project = $this->projectMdl->where('id', '=', $id)->first();
        $project->fill($data);
        $project->save();
    }

    public function delete($id) {
        $project = $this->projectMdl->where('id', '=', $id)->first();
        if($project) {
            $project->delete();
        }
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
