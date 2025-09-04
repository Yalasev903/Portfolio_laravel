<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Contact Email</title>
</head>
<body>
    <p>Имя: {{ $data['name'] }}</p>
    <p>Email: {{ $data['email'] }}</p>
    <p>Тема: {{ $data['subject'] }}</p>
    <p>Сообщение: {{ $data['comments'] }}</p>
</body>
</html>
