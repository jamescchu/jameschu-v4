<?php

namespace App\Controller;

class SiteController extends Controller
{
    static $works = [
      'major-league-gaming' => [
        'slug' => 'major-league-gaming',
        'name' => 'major league gaming',
        'position' => 'art direction',
        'template' => 'major_league_gaming.html.twig',
      ],
      'critr' => [
        'slug' => 'critr',
        'name' => 'critr',
        'position' => 'ux/ui',
        'template' => 'critr.html.twig',
      ],
      'redbox' => [
        'slug' => 'redbox',
        'name' => 'redbox',
        'position' => 'art direction',
        'template' => 'redbox.html.twig',
      ],
    ];

    public function index()
    {
        $this->render('index.html.twig', ['works' => self::$works]);
    }

    public function details($slug)
    {
      if (!isset(self::$works[$slug])) {
        $this->render('404.html.twig', []);
      }

      $this->render('details.html.twig', ['work' => self::$works[$slug]]);
    }

    public function about()
    {
        $this->render('about.html.twig', []);
    }
}
