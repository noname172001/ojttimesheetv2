<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timetracker v2 - Login Page</title>
    <style>
        * {
            box-sizing: border-box;
        }

        table {
            background-color: #1e1e1e;
            color: #e0e0e0;
            border-collapse: collapse;
            border-radius: 5px;
            width: 300px;
        }

        th {
            background-color: #333;
            color: #00d4ff;
            /* Techy blue accent */
            padding: 15px;
            text-align: left;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #444;
        }

        tr:hover {
            background-color: #2a2a2a;
        }

        input {
            width: 100%;
            padding: 10px 15px;
            border-radius: 10px;
        }

        input:focus {
            outline: none;
        }

        input:hover {
            border: 2px inset yellow;
        }

        button {
            padding: 5px 30px;
        }
    </style>
</head>

<body onload="clearError();">
    <center>
        <form action="../includes/login.inc.php" method="post">
            <table>
                <tr>
                    <td>
                        <h1 style="text-align: center;">Login</h1>
                    </td>
                </tr>
                <tr>
                    <td><label for="email">Email</label></td>
                </tr>
                <tr>
                    <td><input type="email" id="email" name="email" placeholder="Email" required></td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                </tr>
                <tr>
                    <td><input type="password" id="password" name="password" placeholder="Password"></td>
                </tr>
                <tr>
                    <td><button type="submit" name="submit">Login</button></td>
                </tr>
                <tr>
                    <td id="error_handle"><?= $test; ?></td>
                </tr>
            </table>
        </form>
    </center>

    <script>
        function clearError() {
            const errorHandler = document.getElementById('error_handle');

            setTimeout(() => {
                errorHandler.innerText = '';
            }, 10000);
        }
    </script>

</body>

</html>