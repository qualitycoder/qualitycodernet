<?php
namespace App\Services;

use App\Models\Project as ProjectMdl;
use App\Models\Webhook as WebhookMdl;

class Webhooks
{
    private $webhookMdl;
    private $projectMdl;

    public function __construct(WebhookMdl $webhookMdl, ProjectMdl $projectMdl) {
        $this->webhookMdl = $webhookMdl;
        $this->projectMdl = $projectMdl;
    }

    public function saveHook($data) {
        /* Comment */
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
}
