<?php

declare(strict_types=1);

namespace App\PaymentGateway\Paddle;

// Инкапсуляция — это размещение данных (свойств и методов) в одном месте (классе) и контроль доступа к ним

class Transaction
{
    private float $amount;      // Модификатор private ограничит доступ к свойству за пределами этого класса
                                // Иногда совершенно нормально иметь public свойства (например в DTO)
    public function getAmount(): float      // Это getter-метод, предоставляющий доступ к значению свойства
    {                                       // Alt + Insert позволяет быстро создать геттеры
        return $this->amount;
    }

    // По сути геттеры и сеттеры нарушают принцип инкапсуляции, поэтому их нужно использовать обдуманно
    // Вместо сеттера лучше принимать значение через конструктор или другой более безопасный метод

    // Геттеры и сеттеры имеют смысл, к примеру, если имеется доп. логика перед установкой значения свойства
    // Например - валидация и форматирование
    // Сеттеры могут использоваться при использовании цепочки методов для установки значения свойства

    public function __construct(float $amount)
    {
        $this->amount = $amount;
    }

    public function process()
    {
        echo 'Processing $' . $this->amount . ' transaction';

        $this->generateReceipt();

        $this->sendEmail();
    }

    public function copyFrom(Transaction $transaction)
    {
        var_dump($transaction->amount, $transaction->sendEmail());
    }

    // Подобные методы нет смысла делать public, так как перед ними нужно сначала создать транзакцию
    // Private не позволит вызывать эти методы без создания транзакции и поможет избежать лишних ошибок
    private function generateReceipt()
    {
    }

    private function sendEmail()
    {
        return true;
    }
}
