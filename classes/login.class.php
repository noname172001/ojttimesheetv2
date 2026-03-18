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
            $this->redirectWithError("emptyinput");
        }

        // check for valid email
        if ($this->isNotValidEmail()) {
            $this->redirectWithError("invalidemail");
        }
    }

    private function isInputEmpty(): bool
    {
        return (empty($this->email) || empty($this->password));
    }

    private function isNotValidEmail(): bool
    {
        return !filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }

    private function redirectWithError(string $error): void
    {
        header("Location: ../dist/index.php?error=$error");
        exit();
    }
}
