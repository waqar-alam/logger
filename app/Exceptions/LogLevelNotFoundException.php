<?php

// app/Exceptions/LogLevelNotFoundException.php

namespace App\Exceptions;

use Exception;

class LogLevelNotFoundException extends Exception
{
    protected $message = 'Log level not found.';
}

