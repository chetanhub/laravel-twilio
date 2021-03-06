<?php

namespace TwilioMan\LaravelTwilio\Exception;

/**
 * Twilio - Exception throw 
 *
 * @package  Twilio
 * @version  0.0.1
 * @author   chetandeep <chetandeep@singsys.com>
*/
class TwilioException extends \Exception
{
    protected $statusCode = 500;


    public function __construct($message = 'An error occurred', $statusCode = null)
    {
        parent::__construct($message);

        if (! is_null($statusCode)) {
            $this->setStatusCode($statusCode);
        }
    }

    /**
     * @param int $statusCode
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    /**
     * @return int the status code
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

}
