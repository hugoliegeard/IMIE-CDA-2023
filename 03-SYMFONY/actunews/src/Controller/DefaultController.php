<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
    public function home()
    {
        return new Response('<h1>Hello World !</h1>');
    }

    public function contact()
    {
        return new Response('<h1>Page Contact !</h1>');
    }
}
