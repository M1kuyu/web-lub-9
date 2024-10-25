<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Миндов Артём Владимирович - 231-362 - Лабораторная работа 9 Вариант 10</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <img src="logo.png" alt="Логотип университета">
        <h1>Миндов Артём Владимирович - 231-362 - Лабораторная работа 9 Вариант 10</h1>
    </header>

<main>
    <?php
    // Параметры задачи
    $start_value = -10;  // Начальное значение аргумента
    $encounting = 100;    // Количество вычисляемых значений
    $step = 2;           // Шаг изменения аргумента
    $min_value = -50;    // Минимальное значение функции
    $max_value = 500;     // Максимальное значение функции
    $type = 'A';         // Тип верстки (A, B, C, D, E)
    
    $x = $start_value;   // Начальное значение аргумента
    $values = [];        // Массив для хранения значений

    // Вычисление функции для каждого аргумента
for ($i = 0; $i < $encounting; $i++, $x += $step) {
    if ($x <= 10) {
        if ($x == 0) {
            $f = 'error';  // Защита от деления на ноль
        } else {
            $f = 3 / $x + $x / 3 - 5;
        }
    } elseif ($x < 20) {
        $f = ($x - 7) * $x / 8;
    } else { // x >= 20
        $f = 3 * $x + 2;
    }

    if (is_numeric($f) && ($f < $min_value || $f > $max_value)) {
        break;  // Остановка при выходе за пределы значений
    }

    $values[] = ['x' => $x, 'f' => is_numeric($f) ? round($f, 3) : $f];
}

    // Вывод значений в зависимости от типа верстки
    switch ($type) {
        case 'A': // Простая верстка текстом
            foreach ($values as $value) {
                echo "f(" . $value['x'] . ") = " . $value['f'] . "<br>";
            }
            break;

        case 'B': // Маркированный список
            echo "<ul>";
            foreach ($values as $value) {
                echo "<li>f(" . $value['x'] . ") = " . $value['f'] . "</li>";
            }
            echo "</ul>";
            break;

        case 'C': // Нумерованный список
            echo "<ol>";
            foreach ($values as $value) {
                echo "<li>f(" . $value['x'] . ") = " . $value['f'] . "</li>";
            }
            echo "</ol>";
            break;

        case 'D': // Табличная верстка
            echo "<table>";
            echo "<tr><th>№</th><th>x</th><th>f(x)</th></tr>";
            foreach ($values as $index => $value) {
                echo "<tr><td>" . ($index + 1) . "</td><td>" . $value['x'] . "</td><td>" . $value['f'] . "</td></tr>";
            }
            echo "</table>";
            break;

        case 'E': // Блочная верстка
            foreach ($values as $value) {
                echo "<div class='block'>f(" . $value['x'] . ") = " . $value['f'] . "</div>";
            }
            break;

        default:
            echo "Неизвестный тип верстки!";
            break;
    }

    // Вычисление статистики
    $f_values = array_filter(array_column($values, 'f'), 'is_numeric');
    $max_f = !empty($f_values) ? max($f_values) : 'N/A';
    $min_f = !empty($f_values) ? min($f_values) : 'N/A';
    $sum_f = !empty($f_values) ? array_sum($f_values) : 'N/A';
    $avg_f = !empty($f_values) ? round(array_sum($f_values) / count($f_values), 3) : 'N/A';

    echo "<br><br>";
    echo "<strong>Максимальное значение функции:</strong> " . $max_f . "<br>";
    echo "<strong>Минимальное значение функции:</strong> " . $min_f . "<br>";
    echo "<strong>Сумма значений функции:</strong> " . $sum_f . "<br>";
    echo "<strong>Среднее арифметическое значений функции:</strong> " . $avg_f . "<br>";
    ?>
</main>

<footer>
    <p>Тип верстки: <?php 
    switch ($type) {
        case 'A': 
            echo "Простая верстка текстом";
            break;

        case 'B': 
            echo "Маркированный список";
            break;

        case 'C':
            echo "Нумерованный список";
            break;

        case 'D': 
            echo "Табличная верстка";
            break;

        case 'E': 
            echo "Блочная верстка";
            break;

        default:
            echo "Неизвестный тип верстки!";
            break; 
        }
        ?> </p>
</footer>

</body>
</html>