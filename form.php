<?php
header('Content-Type: text/html; charset=utf-8');
include_once 'config.php';
date_default_timezone_set('Europe/Moscow');
?>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <a href="index.php">На главную</a>
</body>
</html>


<?php
$surname = $_POST['surname'];
$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$sex = $_POST['sex'];
$message = $_POST['message'];
$topics = $_POST['topics'];
$timeOpenForm = $_POST['datetime'];
$timeSendForm = date("Y-m-d H:i:s");
$topic = "";

echo '<br>';
//echo 'Открытие - '.$timeOpenForm.' Отправка - '.$timeSendForm.'<br>';

switch ($sex) {
    case 'male':
        $sex = 'Мужской';
        break;
    case 'female':
        $sex = 'Женский';
        break;
    case '':
        $sex = '';
        break;
}

//Проверка введенных данных
if (empty($surname))
{
    echo 'Вы не ввели фамилию <br>';
    $surname = 'Пользователь не ввел фамилию';
}

if (empty($name))
{
    echo 'Вы не ввели имя<br>';
    $name = 'Пользователь не ввел имя';
}

if (empty($email))
{
    echo 'Вы не ввели Email<br>';
    $email = 'Пользоваель не ввел Email';
}

if ($number == '+7' || strlen($number) != 12)
{
    echo 'Вы не верно ввели номер<br>';
    $number = 'Номер введен не верно';
}

if (empty($sex))
{
    echo 'Вы не указали ваш пол<br>';
    $sex = 'Пользователь не указал свой пол';
}

if (empty($message))
{
    echo 'Вы не ввели комментарий';
    $message = 'Пользователь не оставил комментарий';
}

echo "Данные комментатора<br> Фамилия: $surname<br>  Имя: $name<br> Пол: $sex <br>Контактные данные:<br>Email: $email <br>Телефона: $number<br>Сообщение: - $message";
echo '<br>';
if (empty($topics))
{
    echo 'Вы не выбрали ни одну тему<br>';
    $topic = 'Пользователь не указал инересующие его темы';
}
else {
    $N = count($topics);
    echo 'Разбирается в слежующих темах:<br>';
    for ($i = 0; $i < $N; $i++)
    {
        echo $topics[$i].'<br>';
        $topic = $topic . $topics[$i] . ', ';
    }
}

//Отправка данных на почту, чтобы не спамить при тестах, пока что отключено
mail ($emailTo , "От диванных экспертов" , "Данные комментатора\n Фамилия: $surname \nИмя: $name \nПол: $sex \nКонтактные данные:\nEmail: $email \nТелефона $number\nСообщение: - $message \n Разбирается в следующих темах: \n $topic\n", "From $emailFrom");



// Блок 2: Cоздание подключения к базе данных
$link = mysqli_connect($db_host, $db_user, $db_password, $db_base) or die('Ошибка - Не удалось подключиться к базе данных' . mysqli_error($link));

// Блок 3: Записываем в БД
$query_insert = 'INSERT INTO messages (surname, name, sex, email, number, message, topic, timeOpenForm, timeSendForm) VALUES ("'. $surname . '","' . $name . '","'. $sex . '","'. $email . '","'. $number . '","' . $message . '","' . $topic . '","' . $timeOpenForm . '","' . $timeSendForm . '")';
mysqli_query($link, $query_insert) or die('Ошибка - Не удалось записать данные в БД!' . mysqli_error($link));

/*
// Блок 4: Вывод из БД
$query_select = 'SELECT * FROM messages';
$result = mysqli_query($link, $query_select) or die('Ошибка' . mysqli_error($link));
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo $row["id"] . ' ' . $row["name"] . ' ' . $row["message"] . ' <br />';
}
mysqli_free_result($result);
*/

// Блок 5: Закрыть подключения к базе данных
mysqli_close($link);
?>
