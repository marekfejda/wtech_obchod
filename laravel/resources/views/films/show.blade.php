<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $film->title }}</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            padding: 40px;
        }

        h1 {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            max-width: 700px;
            border-collapse: collapse;
        }

        td {
            padding: 8px 12px;
            vertical-align: top;
        }

        td:first-child {
            font-weight: bold;
            width: 250px;
            white-space: nowrap;
        }

        td:last-child {
            color: #333;
        }
    </style>
</head>
<body>

    <h1>{{ $film->title }}</h1>

    <table>
        <tr>
            <td>Description</td>
            <td>{{ $film->description }}</td>
        </tr>
        <tr>
            <td>Duration in minutes</td>
            <td>{{ $film->length }}</td>
        </tr>
        <tr>
            <td>Features included on the DVD</td>
            <td>{{ $film->special_features }}</td>
        </tr>
    </table>

</body>
</html>
