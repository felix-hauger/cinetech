<?php

namespace App\Controller;

use App\Renderer;

/**
 * Class to control homepage
 * 
 * @package Home
 * 
 * @var string static $_page_title
 * 
 * @method void index()
 */
class Home
{

    private static string $_page_title = 'Homepage';

    /**
     * Display home page
     */
    public function index(): void
    {
        $renderer = new Renderer();

        echo $renderer->render('home', [
            'title' => self::$_page_title
        ]);
    }
}