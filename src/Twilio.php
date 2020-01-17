<?php
namespace TwilioMan\LaravelTwilio;

use Twilio\Rest\Client;
use TwilioMan\LaravelTwilio\Exception\TwilioException;

class Twilio
{
    /**
     * @var string
     */
    protected $sid;

    /**
     * @var string
     */
    protected $token;

    /**
     * @var string
     */
    protected $from;

    /**
     * @var \Twilio\Rest\Client
     */
     protected $twilio;

    /**
     * @param string $token
     * @param string $from
     * @param string $sid
     */
    public function __construct($sid, $token, $from)
    {
        $this->sid = $sid;
        $this->token = $token;
        $this->from = $from;
    }

    /**
     * @param string $to
     * @param string $message
     * @param array|null $mediaUrls
     * @param array $params
     */
    public function message($to, $message, $mediaUrls = null, array $params = [])
    {
        try
        { 
            if (!isset($params['from'])) {
                $params['from'] = $this->from;
            }

            if (!empty($mediaUrls)) {
                $params['mediaUrl'] = $mediaUrls;
            }

            if (!empty($message)) {
                $params['body'] = $message;
            }

            if (empty($params['from']))
            {
                // throw exception 
                throw new TwilioException('From is not provided in message.', 9000);            
            }
            if (empty($message)) {
                // throw exception 
                throw new TwilioException('Message for body is not provided.', 9001);   
            }
        }
        catch(Exception $e)
        {
            throw new TwilioException('Something missing either from or message body, both are required by package.', 9002);                
        }

        return $this->getTwilio()->messages->create($to, $params);
    }



    /**
     * @return \Twilio\Rest\Client
     */
    public function getTwilio()
    {
        if ($this->twilio) {
            return $this->twilio;
        }

        return $this->twilio = new Client($this->sid, $this->token);
    }

}
