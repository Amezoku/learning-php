<?php

// УПРАВЛЯЮЩИЕ КОНСТРУКЦИИ (if, else, elseif, else if)

$score = 90;
if ($score >= 80) {
    echo '5';
        if ($score >= 90) {     // Внутри одного условия можно вкладывать другие условия
            echo '+';
        }
} elseif ($score >= 60) {
    echo '4';
} else if ($score >= 40) {      // Вариант написания else if через пробел не рекомендуется использовать
    echo '3';
} else {
    echo '2';
}

// ЦИКЛЫ (while, do-while, for, foreach)