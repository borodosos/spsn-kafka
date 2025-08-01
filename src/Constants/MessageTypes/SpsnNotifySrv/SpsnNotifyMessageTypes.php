<?php

namespace Spsn\Kafka\Constants\MessageTypes\SpsnNotifySrv;

class SpsnNotifyMessageTypes {
    public const VERIFY_EMAIL = 'verify_email';
    public const SEND_SMS = 'send_sms';
    public const FORGOT_PASSWORD = 'forgot_password';
    public const CHANGE_EMAIL = 'change_email';
    public const REGISTRATION_NEW_PARTNER = 'registration_new_partner';
    public const INVITE_USER = 'invite_user';
    public const INVITE_PARTNER = 'invite_partner';
    public const NOTIFICATION_OF_RECEIVED_DOCUMENT = 'notification_of_received_document';

    public const MESSAGE_TYPE_SMS = 'sms';
    public const MESSAGE_TYPE_EMAIL = 'email';
    public const MESSAGE_TYPE_MESSAGES = 'messages';

}
