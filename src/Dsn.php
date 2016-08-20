<?php

namespace Redneck1\MongoDB;

/**
 * Class Dsn
 *
 * @package Redneck1\MongoDB
 */
class Dsn
{
    const PREFIX = 'mongodb://';
    const PORT = '27017';

    /** @var string */
    private $host;

    /** @var null|string */
    private $db;

    /** @var null|string */
    private $user;

    /** @var null|string */
    private $password;

    /** @var null|string */
    private $port;

    /**
     * Dsn constructor.
     *
     * @param string $host
     * @param string|null $db
     * @param string|null $user
     * @param string|null $password
     * @param string $port
     */
    public function __construct($host = '127.0.0.1', $db = null, $user = null, $password = null, $port = self::PORT)
    {
        $this->host = $host;
        $this->db = $db;
        $this->user = $user;
        $this->password = $password;
        $this->port = $port;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $dsn = '';

        $dsn .= $this->addCredentials();
        $dsn .= $this->host;
        $dsn .= ':' . $this->port;
        $dsn .= $this->addDb();

        $dsn = static::PREFIX . $dsn;

        return $dsn;
    }

    /**
     * @return string
     */
    private function addCredentials()
    {
        $dsn = '';

        if ($this->user) {
            $dsn .= $this->user;

            if ($this->password) {
                $dsn .= ':' . $this->password;
            }

            $dsn .= '@';
        }

        return $dsn;
    }

    /**
     * @return string
     */
    private function addDb()
    {
        return $this->db ? '/' . $this->db : '';
    }
}