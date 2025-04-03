<?php

require_once '../PaymentProfile.php';
require_once '../Customer.php';
require_once '../Transaction.php';

$transaction = new Transaction(5, 'Test');

// Nullsafe оператор предотвращает Fatal error, если один из методов или свойств в цепочке null

var_dump($transaction->getCustomer()?->getPaymentProfile()?->id);

// Если в цепочке есть null, то цепочка правее от него не будет задействована
// По этой причине nullsafe нужно использовать осторожно, и располагать обязательные методы следует в начале цепочки
// С другой стороны nullsafe может помочь избежать запуска необязательных ресурсозатратных методов справа от него

// Nullsafe оператор позволяет сократить код

//$profileId = null;
//if ($customer = $transaction->getCustomer()) {
//    if ($paymentProfile = $customer->getPaymentProfile()) {
//        $profileId = $paymentProfile->id;
//    }
//}
//var_dump($profileId);

// Больше информации тут https://wiki.php.net/rfc/nullsafe_operator