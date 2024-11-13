<?php

namespace Spsn\Kafka;

use Spsn\Kafka\Constants\SpsnNotifyMessageTypes;
use Spsn\Kafka\Constants\SpsnServicesNames;
use Spsn\Kafka\Messages\SpsnNotify\VerifyEmailMessage;

class SpsnKafkaService {
    public function __construct() {
    }

    public function sendMessageToSpsnNotify(string $messageType, string $email) {
        $producer = new SpsnKafkaProducer(SpsnServicesNames::SPSN_NOTIFY);
        $message = match ($messageType) {
            SpsnNotifyMessageTypes::VERIFY_EMAIL => new VerifyEmailMessage([
                'email' => $email,
            ]),
        };

        $producer->sendMessage($message);
    }
}