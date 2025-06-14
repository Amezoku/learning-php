<?php

namespace App;

class SerializableInvoice
{
    public string $id;

    public function __construct(
        public float $amount,
        public string $description,
        public string $creditCardNumber
    ) {
        $this->id = uniqid('invoice_');
    }

    public function __sleep(): array            // Вызывается до начала сериализации
    {                                           // Возвращает массив с именами сериализуемых свойств
        return ['id', 'amount'];                // Будут сериализованы только свойства id и amount
    }

    public function __wakeup(): void            // Вызывается после десериализации
    {                                           // Нужен, чтобы восстановить соединение, к примеру с БД
        // TODO: Implement __wakeup() method.
    }

    public function __serialize(): array        // Имеет больший приоритет, а метод __sleep() будет проигнорирован
    {                                           // __serialize() дает больший контроль, чем устаревший __sleep()
        return [
            'id' => $this->id,
            'amount' => $this->amount,
            'description' => $this->description,
            'creditCardNumber' => base64_encode($this->creditCardNumber),
            'foo' => 'bar'
        ];
    }

    public function __unserialize(array $data): void    // Заменяет устаревший метод __wakeup() и игнорирует его
    {                                                   // Также дает больший контроль, чем __wakeup()
        $this->id = $data['id'];                        // Принимает аргумент $data для восстановления соединений
        $this->amount = $data['amount'];
        $this->description = $data['description'];
        $this->creditCardNumber = base64_decode($data['creditCardNumber']);
    }
}