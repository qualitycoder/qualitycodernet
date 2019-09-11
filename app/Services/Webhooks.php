<?php
namespace App\Services;

use App\Interfaces\Service;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project as ProjectMdl;

class Webhooks implements Service
{
    private $webhookMdl;
    private $projectMdl;

    public function __construct(Model $mdl){
        $this->webhookMdl = $mdl;
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
        if(empty($this->projectMdl)) {
            throw new \Exception('Not Instantiated: Project Model');
        }
        $this->webhookMdl->data = json_encode($data);
        $project = $this->projectMdl->where('stub', $data['repository']['name'])->first();

        if($project == null) {
            $this->projectMdl->name = $data['repository']['name'];
            $this->projectMdl->language = $data['repository']['language'];
            $this->projectMdl->description = $data['repository']['description'];
            $this->projectMdl->stub = $data['repository']['name'];
            $this->projectMdl->save();

            $project = $this->projectMdl->where('stub', $data['repository']['name'])->first();
        }

        $project->webhooks()->save($this->webhookMdl);
    }

    public function update($id, array $data)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function setProjectModel(ProjectMdl $projMdl) {
        $this->projectMdl = $projMdl;
    }
}
