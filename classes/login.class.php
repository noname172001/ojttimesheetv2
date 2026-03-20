<?php

class Login
{
    public function __construct(
        private string $email,
        private string $password,
        private PDO $connection
    ) {}

    public function loginUser(): void
    {
        // check empty inputs
        if ($this->isInputEmpty()) {
            $this->redirectPage("error", "emptyinput");
        }

        // check for valid email
        if ($this->isNotValidEmail()) {
            $this->redirectPage("error", "invalidemail");
        }

        // validate users in the db
        $hash_password = $this->getHashedPassword();

        // compare both passwords and if match redirect to dashboard
        $this->checkPassword($hash_password) ? $this->redirectPage('', '') : ($this->redirectPage('error', 'errorlogin') ?: exit());
    }

    private function isInputEmpty(): bool
    {
        return (empty($this->email) || empty($this->password));
    }

    private function isNotValidEmail(): bool
    {
        return !filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }

    private function redirectPage(string $uri, string $error): void
    {
        header("Location: /index.php?" . urlencode($uri) . "=" . urlencode($error));
        exit();
    }

    private function getHashedPassword(): string
    {
        try {
            $query = "SELECT password FROM users_login WHERE email = :email";
            $statement = $this->connection->prepare($query);
            $statement->execute([$this->email]);
            return $statement->fetchColumn();
        } catch (PDOException $e) {
            $this->redirectPage("error=", "usernotfound");
            exit();
        }
    }

    private function checkPassword($hash_password): bool
    {
        if (password_verify($this->password, $hash_password)) {
            session_start();
            session_regenerate_id(true);
            $_SESSION['logged_user'] = $this->email;
        }

        return true;
    }
}
