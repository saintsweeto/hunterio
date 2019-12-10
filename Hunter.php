<?php


namespace Hiraya;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Hunter extends Client
{
    const BASE_URI = 'https://api.hunter.io/v2/';

    /** @var array */
    protected $query = [];

    /**
     * Client constructor.
     * @param string $apiKey
     */
    public function __construct($apiKey)
    {
        parent::__construct();

        $this->query = [
            'api_key' => $apiKey,
        ];
    }

    /**
     * Trigger API call
     *
     * @param $method
     * @param $uri
     * @param array $options
     * @return string
     */
    private function trigger($method, $uri, array $options = [])
    {
        try {
            $response = parent::$method(self::BASE_URI.$uri, $options)
                ->getBody()
                ->getContents();
        } catch (RequestException $e) {
            $response = $e->getResponse()->getBody()->getContents();
        }

        return $response;
    }

    /**
     * Returns all the email addresses from a domain
     *
     * @param string $domain
     * @param array $options
     * @return string
     */
    public function searchDomain($domain, $options = [])
    {
        $this->query = array_merge($this->query, $options);

        $query = array_merge($this->query, [
            'domain' => $domain,
        ]);

        return $this->trigger('GET', 'domain-search', [
            'query' => $query,
        ]);
    }

    /**
     * Generates the most likely email address from a domain
     *
     * @param $domain
     * @param $first_name
     * @param $last_name
     * @return string
     */
    public function findEmail($domain, $first_name, $last_name)
    {
        return $this->trigger('GET', 'email-finder', [
            'query' => array_merge($this->query, [
                'domain' => $domain,
                'first_name' => $first_name,
                'last_name' => $last_name,
            ])
        ]);
    }

    /**
     * Verifies the deliverability of an email address
     *
     * @param $email
     * @return string
     */
    public function verifyEmail($email)
    {
        return $this->trigger('GET', 'email-verifier', [
            'query' => array_merge($this->query, [
                'email' => $email,
            ])
        ]);
    }

    /**
     * Counts how many email addresses are there in a domain
     *
     * @param $domain
     * @param string $type
     * @return string
     */
    public function countEmail($domain, $type = 'generic')
    {
        return $this->trigger('GET', 'email-count', [
            'query' => [
                'domain' => $domain,
                'type' => $type,
            ]
        ]);
    }

    /**
     * Retrieves information regarding your account
     *
     * @return string
     */
    public function displayAccount()
    {
        return $this->trigger('GET', 'account', [
            'query' => $this->query
        ]);
    }

    /**
     * Retrieves all the leads saved in your account
     *
     * @return string
     */
    public function listLeads()
    {
        return $this->trigger('GET', 'leads', [
            'query' => $this->query
        ]);
    }

    /**
     * Retrieves all the fields of a lead
     *
     * @param $id
     * @return string
     */
    public function getLead($id)
    {
        return $this->trigger('GET',"leads/$id", [
            'query' => $this->query
        ]);
    }

    /**
     * Creates a new lead
     *
     * @param $data
     * @return string
     */
    public function createLead(array $data)
    {
        return $this->trigger('POST', 'leads', [
            'query' => $this->query,
            'form_params' => $data,
        ]);
    }

    /**
     * Updates an existing lead
     *
     * @param $id
     * @param array $data
     * @return string
     */
    public function updateLead($id, array $data)
    {
        return $this->trigger('PUT', "leads/$id", [
            'query' => $this->query,
            'form_params' => $data,
        ]);
    }

    /**
     * Deletes an existing lead
     *
     * @param $id
     * @return string
     */
    public function deleteLead($id)
    {
        return $this->trigger('DELETE',"leads/$id", [
            'query' => $this->query
        ]);
    }
}
