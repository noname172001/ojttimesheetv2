<?php

class User
{
    protected PDO $connection;

    // this is to instantiate the user
    public function __construct(
        private string $firstname,
        private string $middlename,
        private string $lastname,
        private string $school,
        private int $total_required_hours,
        private int $site_location,
        private string $user_address,
        private string $mobile_no,
        private string $status,
        private string $date_status_updated,
        private string $email,
        private string $password,
        private string $role
    ) {
        $this->connection = require __DIR__ . '/../includes/connection.php';
    }

    public function insertUser()
    {
        // function to insert user to the db using transaction
    }

    public function getUser()
    {
        // function to get user
        echo $this->email;
    }

    public function getAllUser()
    {
        //function to get all the users
    }

    public function editUser()
    {
        //function to edit the user
    }
}
