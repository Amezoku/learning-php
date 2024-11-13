<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Combining PHP and HTML</title>
    </head>
    <body>
        <?php $score = 90 ?>                <!--Пример встраивания конструкции if else внутри HTML-->

        <?php if ($score >= 80): ?>
            <strong>5</strong>
        <?php elseif ($score >= 60): ?>     <!--Внутри HTML вариант else if с пробелом не работает-->
            <strong>4</strong>
        <?php elseif ($score >= 40): ?>
            <strong>3</strong>
        <?php else: ?>
            <strong>2</strong>
        <?php endif ?>
    </body>
</html>