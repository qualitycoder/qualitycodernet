<?php
namespace App\Services;

use App\Models\Page as PageMdl;

class Pages
{
    private $pageMdl;

    public function __construct(PageMdl $pageMdl) {
        $this->pageMdl = $pageMdl;
    }

    public function saveHook($data) {

    }
}
