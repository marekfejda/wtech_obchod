<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>User profile</title>
</head>
<body>
    <h1>Hello, {{ $user->name }}</h1>
    <p>Your email is: {{ $user->email }}</p>
</body>
</html>