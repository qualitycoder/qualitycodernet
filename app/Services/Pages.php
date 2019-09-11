<?php
namespace App\Services;

use App\Interfaces\Service;
use App\Interfaces\Stubable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Pages implements Service, Stubable
{
    private $pageMdl;

    public function __construct(Model $mdl) {
        $this->pageMdl = $mdl;
    }

    public function getSingleByStub($stub) {
        return $this->pageMdl::where('stub', '=', $stub)->first();
    }

    public function create(array $data) {
        $data = $this->cleanseInput($data);

        $newProject = $this->pageMdl->newInstance($data);
        $newProject->save();
    }

    public function update($id, array $data) {
        $data = $this->cleanseInput($data);

        $page = $this->pageMdl->where('id', '=', $id)->first();
        $page->fill($data);
        $page->save();
    }

    public function delete($id) {
        $page = $this->pageMdl->where('id', '=', $id)->first();
        if($page) {
            $page->delete();
        }
    }

    private function cleanseInput($data) {

        $columns = Schema::getColumnListing($this->pageMdl->getTable());
        $new_data = [];

        foreach($data as $field => $value) {
            if(in_array($field, $columns)){
                $new_data[$field] = $value;
            }
        }

        return $new_data;
    }
}
