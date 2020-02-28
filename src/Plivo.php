<?php

namespace NotificationChannels\Plivo;

use Plivo\RestClient as PlivoRestClient;

class Plivo extends PlivoRestClient
{
    /** @var string */
    protected $auth_id;

    /** @var string */
    protected $authToken;

    /** @var string */
    protected $from;

    /** @var string */
    protected $webhook;

    /**
     * Create a new Plivo RestAPI instance.
     *
     * @param array $config
     * @return void
     */
    public function __construct(array $config)
    {
        $this->auth_id = $config['auth_id'];
        $this->authToken = $config['auth_token'];
        $this->from = $config['from_number'];
        $this->webhook = array_key_exists('webhook', $config) ? $config['webhook'] : '';

        parent::__construct($this->auth_id, $this->authToken);
    }

    /**
     * Number SMS is being sent from.
     *
     * @return string
     */
    public function from()
    {
        return $this->from;
    }

    /**
     * The webhook url plivo will call when statuses change.
     *
     * @return string
     */
    public function webhook()
    {
        return $this->webhook;
    }
}

