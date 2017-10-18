<?php

namespace Hiraya;

/**
 * Class Hunter
 * @package Hiraya
 */
class Hunter extends Client
{
    /**
     * Hunter constructor.
     * @param string $apiKey
     */
    public function __construct($apiKey)
    {
        parent::__construct($apiKey);
    }

    /**
     * Returns all the email addresses from a domain
     *
     * @param $domain
     * @return string
     */
    public function searchDomain($domain)
    {
        $prefix = 'domain-search';

        $parameters = [
            'domain' => $domain,
        ];

        return $this->retrieve($prefix, $parameters);
    }

    /**
     * Generates the most likely email address from a domain
     *
     * @param $domain
     * @param $first_name
     * @param $last_name
     * @return string
     */
    public function findEmailByDomain($domain, $first_name, $last_name)
    {
        $prefix = 'email-finder';

        $parameters = [
            'domain' => $domain,
            'first_name' => $first_name,
            'last_name' => $last_name,
        ];

        return $this->retrieve($prefix, $parameters);
    }

    /**
     * Generates the most likely email address from a company
     *
     * @param $company
     * @param $full_name
     * @return string
     */
    public function findEmailByCompany($company, $full_name)
    {
        $prefix = 'email-finder';

        $parameters = [
            'company' => $company,
            'full_name' => $full_name,
        ];

        return $this->retrieve($prefix, $parameters);
    }

    /**
     * Verifies the deliverability of an email address
     *
     * @param $email
     * @return string
     */
    public function verifyEmail($email)
    {
        $prefix = 'email-verifier';

        $parameters = [
            'email' => $email,
        ];

        return $this->retrieve($prefix, $parameters);
    }

    /**
     * Counts how many email addresses are there in a domain
     *
     * @param $domain
     * @return string
     */
    public function countEmail($domain)
    {
        $prefix = 'email-count';

        $parameters = [
            'domain' => $domain,
        ];

        return $this->retrieve($prefix, $parameters);
    }

    /**
     * Retrieves information regarding your account
     *
     * @return string
     */
    public function displayAccount()
    {
        $prefix = 'account';

        return $this->retrieve($prefix);
    }
}
