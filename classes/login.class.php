<?php

class Login
{
    public function __construct(private PDO $connection) {}

    public function test()
    {
        return $this->connection;
    }
}
