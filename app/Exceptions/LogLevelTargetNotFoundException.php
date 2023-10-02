<?php

namespace App\Exceptions;

use Exception;

class LogLevelTargetNotFoundException extends Exception
{
    protected $message = 'Log Level Target not found.';
    protected $code = 404;
}

