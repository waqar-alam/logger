<?php

// app/Exceptions/LogNotFoundException.php

namespace App\Exceptions;

use Exception;

class LogNotFoundException extends Exception
{
    protected $message = 'Log not found.';
}

