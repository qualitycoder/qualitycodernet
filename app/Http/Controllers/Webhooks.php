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
        $data = $request->json();

        /* comment */
        error_log(print_r($data, true));

        $response = $this->service->saveHook($data);
        return $response;
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
