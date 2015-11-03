<?php

namespace MyApp\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

class BookController
{
    public function index()
    {
        $message = 'Books index';

        return new JsonResponse(
            array('message' => $message),
            200
        );
    }

    public function edit($id)
    {
        $message = 'Books edit' . $id;

        return new JsonResponse(
            array('message' => $message),
            200
        );

    }

    public function show($id)
    {
        $message = 'Books show ' . $id;

        return new JsonResponse(
            array('message' => $message),
            200
        );
    }

    public function store()
    {
        $message = 'Books store';

        return new JsonResponse(
            array('message' => $message),
            200
        );
    }

    public function update($id)
    {
        $message = 'Books update' . $id;

        return new JsonResponse(
            array('message' => $message),
            200
        );
    }

    public function destroy($id)
    {
        $message = 'Books destroy' . $id;

        return new JsonResponse(
            array('message' => $message),
            200
        );
    }
}
