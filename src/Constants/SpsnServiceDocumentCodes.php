<?php

namespace Spsn\Kafka\Constants;

class SpsnServiceDocumentCodes {
    public const RECEIVED_ON_CLIENT_SIDE = '100201';
    public const SENT_FOR_VALIDATION = '100202';
    public const VALIDATION_SUCCESS = '100203';
    public const REQUIRED_REVALIDATION = '100207';
    public const SEND_MESSAGE_TO_PARTNER = '100208';
    public const VALIDATION_FAILED = '100501';
    public const SIGNING_REJECTED = '100503';
    public const ERROR = '100506';
    public const SERVICE_ERROR = '100507';
    public const DTS_ERROR = '100508';
    public const REVOCATION = '100601';
}