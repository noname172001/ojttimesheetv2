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
            background-color: #0893d3;
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

        input {
            width: 100%;
            padding: 10px 15px;
            border-radius: 10px;
            border: 1px solid gray;
        }

        input:focus {
            outline: none;
        }

        input:hover {
            border: 1px inset yellow;
        }

        button {
            padding: 5px 30px;
            margin: 10px 0;
        }

        .error_handle {
            background-color: #f8a6a6;
            padding: 25px 15px;
            border-radius: 5px;
            margin-bottom: 5px;
            text-align: center;
            font-size: 14px;
            letter-spacing: 0.5px;
        }

        label {
            color: #fff;
        }
    </style>
</head>

<body onload="clearError();">
    <div style="height: 90vh; display: flex; justify-content: center; align-items:center;">
        <form action="../includes/login.inc.php" method="post">
            <div id="error_handle" class="error_handle">
                <?= $test; ?>
            </div>
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

            </table>
        </form>
    </div>
    <script>
        function clearError() {
            const errorHandler = document.getElementById('error_handle');

            setTimeout(() => {
                errorHandler.style.visibility = 'hidden';
            }, 8000);
        }
    </script>

</body>

</html>