<?php
namespace App\Services;

use App\Interfaces\Service;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project as ProjectMdl;
use Illuminate\Support\Facades\Schema;

class Webhooks implements Service
{
    private $webhookMdl;
    private $projectMdl;

    public function __construct(Model $mdl) {
        $this->webhookMdl = $mdl;
    }

    public function getList() {
        return $this->webhookMdl::all();
    }

    public function getSingleById($id) {
        return $this->webhookMdl::where('id','=', $id)->first();
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
        $data = $this->cleanseInput($data);

        $webhook = $this->getSingleById($id);
        $webhook->fill($data);
        $webhook->save();
    }

    public function delete($id)
    {
        $webhook = $this->webhookMdl->where('id', '=', $id)->first();
        if($webhook) {
            $webhook->delete();
        }
    }

    public function setProjectModel(ProjectMdl $projMdl) {
        $this->projectMdl = $projMdl;
    }

    private function cleanseInput($data) {

        $columns = Schema::getColumnListing($this->webhookMdl->getTable());
        $new_data = [];

        foreach($data as $field => $value) {
            if(in_array($field, $columns)){
                $new_data[$field] = $value;
            }
        }

        return $new_data;
    }
}
