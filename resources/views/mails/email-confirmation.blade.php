
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact+Gothic|Comfortaa:400,700&subset=latin,cyrillic">
</head>



<body>
<div>Приветствуем и благодарим вас за регистрацию :)</div>
    <h2>
        Чтобы подтвердить ваш email, пожалуйста перейдите по ссылке
    </h2>
    <a href="{{route('confirm.email', [$user, $token])}}">Нажмите здесь</a>
    <h4>
        Ваш email: {{$user->email}}<br>

    </h4>
    Никому не говорите свой пароль! Помните об этом.<br>
    <small>С наилучшими пожеланиями.</small>

    <footer>
        <p>Company © SSAU. All rights reserved.</p>
    </footer>

</body>

</html>



<style>

    div {
        border-radius: 0.5rem;
        padding: 10px 20px;
        background: #a08b9c;
        color: white;
        text-align: center;
    }

    body {
        font-family: 'Nunito', sans-serif;
    }

    footer {
        border-radius: 0.5rem;
        margin-top: 10px;
        padding: 10px 20px;
        background: #a08b9c;
        color: white;
        text-align: center;
    }
    a {
        color: #00aaff;
    }

</style>

