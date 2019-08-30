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
        //
    }

    public function store(Request $request) {
        /* What? */
        $this->service->saveHook($request->json()->all());
    }

    public function show($id) {

    }

    public function update(Request $request, $id) {
        //
    }

    public function destroy($id) {
        //
    }
}
