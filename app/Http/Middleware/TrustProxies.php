<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;
<<<<<<< HEAD
//use Fideloper\Proxy\TrustProxies as Middleware;
use Illuminate\Http\Middleware\TrustProxies as Middleware;
=======
>>>>>>> 6401360c73a61a883f8722267dd1d6ec54fbde92

class TrustProxies extends Middleware
{
    /**
     * The trusted proxies for this application.
     *
     * @var array<int, string>|string|null
     */
    protected $proxies;

    /**
     * The headers that should be used to detect proxies.
     *
     * @var int
     */
<<<<<<< HEAD
    //protected $headers = Request::HEADER_X_FORWARDED_ALL;

    protected $headers =
    Request::HEADER_X_FORWARDED_FOR |
=======
    protected $headers =
        Request::HEADER_X_FORWARDED_FOR |
>>>>>>> 6401360c73a61a883f8722267dd1d6ec54fbde92
        Request::HEADER_X_FORWARDED_HOST |
        Request::HEADER_X_FORWARDED_PORT |
        Request::HEADER_X_FORWARDED_PROTO |
        Request::HEADER_X_FORWARDED_AWS_ELB;
}
