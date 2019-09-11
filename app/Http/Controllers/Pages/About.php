<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Interfaces\Service;
use Illuminate\Http\Request;

class About extends Controller
{
    private $service;

    public function __construct(Service $pageSvc) {
        $this->service = $pageSvc;
    }

    public function index() {
        return $this->service->getSingleByStub('about');
    }

    public function store(Request $request) {
        $this->service->create($request->all());
    }

    public function update(Request $request, $id) {
        $this->service->update($id, $request->all());
    }

    public function destroy($id) {
        $this->service->delete($id);
    }
}
