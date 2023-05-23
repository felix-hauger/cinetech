<?php

namespace App;

/**
 * Class used to render pages
 * 
 * @package Renderer
 * 
 * @var string PATH constant defining default view path
 * 
 * @method string render(string $view, array $params = [])
 */
class Renderer
{
    /**
     * @var string The default view path
     */
    private const PATH = __DIR__ . DIRECTORY_SEPARATOR . 'View' . DIRECTORY_SEPARATOR;

    /**
     * Render view with optional parameters
     * 
     * @param string $view The view requested, filename without extension
     * @param string $params The parameters to extract to get variables in the view
     * 
     * @return string The required view
     */
    public function render(string $view, array $params = []): string
    {
        ob_start();

        extract($params);

        require self::PATH . $view . '.php';

        return ob_get_clean();
    }
}