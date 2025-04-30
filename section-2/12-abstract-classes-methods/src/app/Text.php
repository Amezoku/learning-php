<?php

namespace App;

class Text extends Field
{
    // При переопределении методы дочернего класса могут дополнительные аргументы со значением по умолчанию
    public function render($x = 1): string
    {
        return <<<HTML
<input type="text" name="{$this->name}" />
HTML;
    }   // Heredoc используется тут лишь для примера, в реальном проекте скорее всего будет view-файл для отображения
}