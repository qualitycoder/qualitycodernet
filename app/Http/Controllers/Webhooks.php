<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Webhooks as WebhooksSvc;

class Webhooks extends Controller
{
    private $service;

    public function __construct(WebhooksSvc $hooks) {
        $this->service = $hooks;
    }
    public function index() {
        return $this->service->getList();
    }

    public function store(Request $request) {
        $this->service->create($request->json()->all());
    }

    public function show($id) {
        $this->service->getSingleById($id);
    }

    public function update(Request $request, $id) {
        $this->service->update($id, $request->all());
    }

    public function destroy($id) {
        $this->service->delete($id);
    }
}
