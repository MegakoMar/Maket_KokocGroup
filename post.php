<?php
header('Content-Type: text/html; charset=utf-8');
$surname = $_POST['surname'];
$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$sex = $_POST['sex'];
$sub = $_POST['sub'];
$message = $_POST['message'];
$topics = $_POST['topics'];

if ($sex == "male")
{
    $sex = 'Мужской';
}
else {
    $sex = 'Женский';
}

echo "Данные комментатора<br> Фамилия: $surname Имя: $name<br> Пол: $sex <br>Контактные данные:<br>Email: $email <br>Телефона: $number<br>Сообщение: - $message";
echo '<br>';
if (empty($topics))
{
    echo 'Ни в чем не разбирается';
}
else {
    $N = count($topics);
    echo 'Разбирается в слежующих темах:<br>';
    for ($i = 0; $i < $N; $i++)
    {
        echo $topics[$i].'<br>';
    }
}

//mail ("romchik9824@yandex.ru" , "От диванных экспертов" , "Данные комментатора\n Фамилия: $surname Имя: $name Пол: $sex \nКонтактные данные:\nEmail: $email \nТелефона $number\nСообщение: - $message", "From romchik9824@ygmail.com");

?>