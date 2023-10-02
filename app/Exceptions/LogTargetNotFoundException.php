<?php

// app/Exceptions/LogTargetNotFoundException.php

namespace App\Exceptions;

use Exception;

class LogTargetNotFoundException extends Exception
{
    protected $message = 'Log target not found.';
}

