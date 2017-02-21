<?php

namespace App\Controller;

class SiteController extends Controller
{
    static $works = [
      'major-league-gaming' => [
        'slug' => 'major-league-gaming',
        'name' => 'major league gaming',
        'position' => 'art direction, research and strategy',
        'template' => 'major_league_gaming.html.twig',
      ],
      'critr' => [
        'slug' => 'critr',
        'name' => 'critr',
        'position' => 'ux/ui, research and strategy, prototyping',
        'template' => 'critr.html.twig',
      ],
      'chanbara' => [
        'slug' => 'chanbara',
        'name' => 'chanbara poster',
        'position' => 'typography, print making',
        'template' => 'chanbara.html.twig',
      ],
      'elysium' => [
        'slug' => 'elysium',
        'name' => 'elysium book',
        'position' => 'typography, book making, creative writing',
        'template' => 'elysium.html.twig',
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

      // Init variables
      $currentIndex = array_search($slug, array_keys(self::$works));
      $prev = null;
      $next = null;
      $temporaryPrev = null;

      foreach (self::$works as $key => $work) {
        // If the current key matches the slug we have to set the previous link
        // with the temporarily saved link
        if ($key === $slug) {
          $prev = isset($temporaryPrev) ? $temporaryPrev : false;
          continue;
        }

        // If we have already found the current link we have to set the next link
        if (isset($prev) || $prev === false) {
          $next = $work['slug'];
          break;
        }

        // Save temporarily saved previous link
        $temporaryPrev = $work['slug'];
      }

      $this->render('details.html.twig', [
        'work' => self::$works[$slug],
        'prev' => $prev,
        'next' => $next,
      ]);
    }

    public function process($slug)
    {
      if (!isset(self::$works[$slug])) {
        $this->render('404.html.twig', []);
      }

      $this->render('process.html.twig', ['work' => self::$works[$slug]]);
    }

    public function about()
    {
        $this->render('about.html.twig', []);
    }
}
