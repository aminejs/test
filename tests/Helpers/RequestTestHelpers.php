<?php

namespace App\Tests\Helpers;


use Symfony\Component\HttpFoundation\Request;

trait RequestTestHelpers
{

    public function createFakeQueryHttpRequest(array $queryData) {
        $request = new Request();
        $request->query->add($queryData);
        return $request;
    }
}
