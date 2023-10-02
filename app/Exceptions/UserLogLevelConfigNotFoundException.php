<?php

// app/Exceptions/UserLogLevelConfigNotFoundException.php

namespace App\Exceptions;

use Exception;

class UserLogLevelConfigNotFoundException extends Exception
{
    /**
     * Report or log the exception.
     *
     * @return void
     */
    public function report()
    {
        // You can log the exception if needed.
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return response()->json(['error' => 'User log level configuration not found.'], 404);
    }
}

