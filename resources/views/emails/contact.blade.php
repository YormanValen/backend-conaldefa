<!DOCTYPE html>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Nuevo mensaje de contacto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 5px;
        }
        h1 {
            color: #333333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #dddddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .footer {
            margin-top: 20px;
            font-size: 0.9em;
            color: #666666;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Nuevo mensaje de contacto</h1>
        <table>
            <tr>
                <th>Nombre</th>
                <td>{{ $details['name'] }}</td>
            </tr>
            <tr>
                <th>Correo electrónico</th>
                <td>{{ $details['email'] }}</td>
            </tr>
            <tr>
                <th>Teléfono</th>
                <td>{{ $details['phone'] ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Ciudad</th>
                <td>{{ $details['city'] ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Mensaje</th>
                <td>{{ $details['message'] }}</td>
            </tr>
        </table>
        <div class="footer">
            <p>Este es un mensaje automático generado por el sistema de contacto de la web.</p>
        </div>
    </div>
</body>

</html>
