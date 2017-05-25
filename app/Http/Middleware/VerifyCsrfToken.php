<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    //protected $except = ['userlogin'];
    protected $except = ['jancuk', 'login', 'register', 'get_course/choice', 'get_course/change/1', 'get_course/change/2', 'get_course/change/3', 'input_question', 'input_answer', 'trying', 'get_offer/send', 'get_discuss/send'];
}
