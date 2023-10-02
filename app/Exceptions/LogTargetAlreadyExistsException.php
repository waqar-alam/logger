<?php

// app/Exceptions/LogTargetAlreadyExistsException.php

namespace App\Exceptions;

use Exception;

class LogTargetAlreadyExistsException extends Exception
{
    protected $message = 'Log target already exists.';
}
