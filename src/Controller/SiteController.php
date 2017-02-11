<?php

namespace App\Controller;

class SiteController extends Controller
{
    public function index()
    {
        $this->render('index.html.twig', []);
    }
}
