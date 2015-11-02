<?php

namespace MyApp\Controller;

class BookController
{
    public function index()
    {
        return 'Books index';
    }

    public function edit($id)
    {
        return 'Books edit' . $id;
    }

    public function show($id)
    {
        return 'Books show ' . $id;
    }

    public function store()
    {
        return 'Books store';
    }

    public function update($id)
    {
        return 'Books update' . $id;
    }

    public function destroy($id)
    {
        return 'Books destroy' . $id;
    }
}
