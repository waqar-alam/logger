<?php

// app/Exceptions/LogAlreadyExistsException.php

namespace App\Exceptions;

use Exception;

class LogAlreadyExistsException extends Exception
{
    protected $message = 'Log already exists.';
}

