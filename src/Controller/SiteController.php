<?php

namespace App\Controller;

class SiteController extends Controller
{
    public function index()
    {
        $works = [
          [
            'name' => 'major league gaming',
            'position' => 'art direction',
          ],
          [
            'name' => 'critr',
            'position' => 'ux/ui',
          ],
          [
            'name' => 'redbox',
            'position' => 'art direction',
          ],
        ];
        $this->render('index.html.twig', ['works' => $works]);
    }

    public function about()
    {
        $this->render('about.html.twig', []);
    }
}
