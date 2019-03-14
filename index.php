<?php
header('Content-Type: text/html; charset=utf-8');
?>

<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <h2>Крутая форма для диванных экспертов</h2>
    <form action="form.php" method="post">
        <div>
            <label>
                Фамилия:
                <input type="text" name="surname" placeholder="Введите фамилию">
            </label>
        </div>
        <div>
            <label>
                Имя:
                <input type="text" name="name" placeholder="Введите имя" required>
            </label>
        </div>
        <div>
            <label>
                Email:
                <input type="email" name="email" placeholder="your_name@domain.com" size="30">
            </label>
        </div>
        <div>
            <label>
                Номер телефона:
                <input type="text" name="number" placeholder="Введите номер" value="+7" maxlength="12">
            </label>
        </div>
        <div>
            <label>
                Ваш пол:
                <span><input type="radio" name="sex" value="male">Мужской</span>
                <span><input type="radio" name="sex" value="female">Женский</span>
            </label>
        </div>
        <div>
            <label>
                Считаете ли вы себя экспертом в следующих областях:
            </label>
            <div>
                Футбол
                <input type="checkbox" name="topics[]" value="Футбол">
            </div>
            <div>
                Баскетбол
                <input type="checkbox" name="topics[]" value="Баскетбол">
            </div>
            <div>
                Хокей
                <input type="checkbox" name="topics[]" value="Хокей">
            </div>
            <div>
                Волейбол
                <input type="checkbox" name="topics[]" value="Волейбол">
            </div>
            <div>
                Теннис
                <input type="checkbox" name="topics[]" value="Теннис">
            </div>
            <div>
                Dota 2
                <input type="checkbox" name="topics[]" value="Dota 2">
            </div>
            <div>
                СS:GO
                <input type="checkbox" name="topics[]" value="СS:GO">
            </div>
        </div>
        <label>
            Комментарий:<br>
            <textarea type="text" name="message" placeholder="Ваше мнение" required></textarea><br>
        </label>
        <button type="submit">Подтвердить</button>
        <input type="hidden" name="datetime" value="<?php $date = date("Y-m-d H:i:s"); echo htmlspecialchars($date); ?>">
    </form>
</body>
</html>
