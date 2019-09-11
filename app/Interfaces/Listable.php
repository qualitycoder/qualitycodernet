<?php


namespace App\Interfaces;


interface Listable {
    public function getList();
    public function getSingleById($id);
}
