<?php
$config = require __DIR__ . './../includes/config.php';

$db = $config['database'];

$errors  = 0; # if the value of this doesnt change means all operations succeeded

// connecting to the db engine
try {
    $dsn = "mysql:host={$db['db_host']}";
    $pdo = new PDO($dsn, $db['db_user'], $db['db_pass'], $config['pdo_options']);
    $mysql_connected = "<p class='success'>Connection to database engine succeeded!</p>";
} catch (PDOException $e) {
    $mysql_connected = "<p class='error'>Connection to database failed</p>";
}

// create the database
try {
    $sqlcommand = "CREATE DATABASE IF NOT EXISTS {$db['db_name']} CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;";
    $pdo->exec($sqlcommand);
    $db_created = "<p class='success'>Database <strong>{$db['db_name']}</strong> created successfully!</p>";
} catch (PDOException $e) {
    $db_created = "<p class='error'>Database creation failed!</p>";
}

// select the datase
try {
    $sqlcommand = "USE {$db['db_name']};";
    $pdo->exec($sqlcommand);
    $db_selected = "<p class='success'>Database <strong>{$db['db_name']}</strong> is now selected!</p>";
} catch (PDOException $e) {
    $db_selected = "<p class='error'>Can't select the database <strong>{$db['db_name']}</strong>!</p>";
}

// create the tables
$tables = [
    "users" => "CREATE TABLE IF NOT EXISTS users (
            users_id INT AUTO_INCREMENT PRIMARY KEY,
            first_name VARCHAR(50) NOT NULL,
            middle_name VARCHAR(50),
            last_name VARCHAR(50) NOT NULL,
            school VARCHAR(100),
            total_required_hours INT DEFAULT 0,
            site_location INT,
            user_address TEXT,
            mobile_no VARCHAR(30),
            status ENUM('active','inactive','suspended','deleted') DEFAULT 'active',
            date_status_updated DATETIME DEFAULT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",

    "users_login" => "CREATE TABLE IF NOT EXISTS users_login (
            id INT AUTO_INCREMENT PRIMARY KEY,
            users_id INT NOT NULL,
            email VARCHAR(150) UNIQUE NOT NULL,
            password VARCHAR(255) NOT NULL,
            role ENUM('admin','intern') NOT NULL,
            CONSTRAINT fk_user_login
                FOREIGN KEY (users_id)
                REFERENCES users(users_id)
                ON DELETE CASCADE
                ON UPDATE CASCADE
            )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",

    "timesheet" => "CREATE TABLE IF NOT EXISTS timesheet (
            timesheet_id INT AUTO_INCREMENT PRIMARY KEY,
            users_id INT NOT NULL,
            log_date DATE NOT NULL,
            log_time_in TIME NOT NULL,
            log_time_out TIME DEFAULT NULL,
            total_log_hours DECIMAL(5,2) DEFAULT 0.00,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            CONSTRAINT fk_timesheet_user
                FOREIGN KEY (users_id)
                REFERENCES users(users_id)
                ON DELETE CASCADE
                ON UPDATE CASCADE
            )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",

    "sites" => "CREATE TABLE IF NOT EXISTS site_location (
            site_location_id INT AUTO_INCREMENT PRIMARY KEY,
            site_name VARCHAR(50) NOT NULL
            )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;"
];

$table_arr = [];
foreach ($tables as $tablename => $sqlcommand) {
    try {
        $pdo->exec($sqlcommand);
        $table_arr[] = "<p class='success'>Successfully created the {$tablename} table.</p>";
    } catch (PDOException $e) {
        $table_arr[] = "<p class='error'>Error creating the {$tablename} table.</p>";
    }
}

// insert the default admin and populate a sample data.
$admin = [
    'firstname' => 'IT',
    'lastname' => 'Admin',
    'status' => 'active',
    'email' => 'itadmin@omegahms.com',
    'password' => 'admin123',
    'role' => 'admin',
    'role_users_id'
];

$password_hashed = password_hash($admin['password'], PASSWORD_DEFAULT);

// re-assign the password hash
$admin['password'] = $password_hashed;

try {
    // begin transaction to make sure everything is inserted
    $pdo->beginTransaction();

    $sqlcommand = "INSERT INTO users(`first_name`,`last_name`,`status`) VALUES(:first, :last, :status)";
    $statement = $pdo->prepare($sqlcommand);
    $statement->execute([
        ':first' => $admin['firstname'],
        ':last' => $admin['lastname'],
        ':status' => $admin['status'],
    ]);

    $new_user_id = $pdo->lastInsertId();

    // insert the same user to login table
    $sqlcommand_role = "INSERT INTO users_login(`users_id`,`email`,`password`,`role`) VALUES(:users_id, :email, :password, :role)";
    $statement_role = $pdo->prepare($sqlcommand_role);
    $statement_role->execute([
        ':users_id' => $new_user_id,
        ':email' => $admin['email'],
        ':password' => $admin['password'],
        ':role' => $admin['role'],
    ]);

    $pdo->commit();
    $admin_created = "<p class='success'>Admin account and roles has been created successfully!.</p>";
} catch (PDOException $e) {
    $pdo->rollBack();
    $admin_created = "<p class='error'>Admin account creation failed!.</p>";
}
