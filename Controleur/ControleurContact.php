<?php

namespace Blog\Controleur;

use Blog\Framework\Controleur;


class ControleurContact extends Controleur
{
    public function __construct()
    {
    }

    public function index()
    {
        $this->genererVue();
    }
}