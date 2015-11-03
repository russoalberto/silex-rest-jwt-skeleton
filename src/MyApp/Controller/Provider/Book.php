<?php

namespace MyApp\Controller\Provider;

use Silex\Application;
use Silex\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Firebase\JWT\JWT;

class Book implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $books = $app['controllers_factory'];

        $books->before(function (Request $request) use ($app) {
            // Strip out the bearer
            $rawHeader = $request->headers->get('Authorization');
            if ($rawHeader) {
                if (strpos($rawHeader, 'Bearer ') === false) {
                    return new JsonResponse(
                        array('message' => 'Unauthorized'),
                        401
                    );
                }

                $jwt = str_replace('Bearer ', '', $rawHeader);
                $secretKey = base64_decode($app['secret']);

                try {
                    $token = JWT::decode($jwt, $secretKey, [$app['algorithm']]);
                } catch (Exception $e) {
                    return new JsonResponse(
                        array('message' => 'Unauthorized'),
                        401
                    );
                }
            } else {
                return new JsonResponse(
                    array('message' => 'Bad Request'),
                    400
                );
            }
        });

        $books->get('/', 'MyApp\\Controller\\BookController::index');

        $books->post('/', 'MyApp\\Controller\\BookController::store');

        $books->get('/{id}', 'MyApp\\Controller\\BookController::show');

        $books->get('/edit/{id}', 'MyApp\\Controller\\BookController::edit');

        $books->put('/{id}', 'MyApp\\Controller\\BookController::update');

        $books->delete('/{id}', 'MyApp\\Controller\\BookController::destroy');

        return $books;
    }
}
