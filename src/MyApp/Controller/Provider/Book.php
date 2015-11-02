<?php

namespace MyApp\Controller\Provider;

use Silex\ControllerProviderInterface;
use Silex\Application;

class Book implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $books = $app['controllers_factory'];

        $books->get('/', 'MyApp\\Controller\\BookController::index');

        $books->post('/', 'MyApp\\Controller\\BookController::store');

        $books->get('/{id}', 'MyApp\\Controller\\BookController::show');

        $books->get('/edit/{id}', 'MyApp\\Controller\\BookController::edit');

        $books->put('/{id}', 'MyApp\\Controller\\BookController::update');

        $books->delete('/{id}', 'MyApp\\Controller\\BookController::destroy');

        return $books;
    }
}
