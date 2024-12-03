<?php

namespace Spsn\Kafka\Traits;

use Illuminate\Support\Facades\Validator;

trait HasValidation {
    public function validateInvitationMessage($data) {
        $validator = Validator::make($data, [
            'ext_message_id' => 'required',
            'sender_operator' => 'required|array',
            'sender_operator.id' => 'required',
            'recipient_operator' => 'required|array',
            'recipient_operator.id' => 'required',
            'sender' => 'required|array',
            'sender.id' => 'required',
            'sender.country_code' => 'required|string',
            'sender.company' => 'required|string',
            'sender.inn' => 'string',
            'sender.kpp' => 'string',
            'sender.bin' => 'string',
            'sender.email' => 'required|email',
            'recipient' => 'required|array',
            'recipient.id' => 'required',
            'recipient.country_code' => 'required|string',
            'recipient.company' => 'required|string',
            'recipient.inn' => 'string',
            'recipient.kpp' => 'string',
            'recipient.bin' => 'string',
            'recipient.email' => 'required|email',
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors());
        }
    }

    public function validateContentMessage($data) {
        $validator = Validator::make($data, [
            'message_id' => 'required',
            'workflow_id' => 'required',
            'document_id' => 'required',
            'sender_operator' => 'required|array',
            'sender_operator.id' => 'required',
            'recipient_operator' => 'required|array',
            'recipient_operator.id' => 'required',
            'sender' => 'required|array',
            'sender.id' => 'required',
            'recipient' => 'required|array',
            'recipient.id' => 'required',
            'document' => 'required|array',
            'document.signature_required' => 'required|boolean',
            'document.signature_type' => 'required|string',
            'document.meta' => 'required|array',
            'document.meta.document_name' => 'required|string',
            'document.meta.artifacts' => 'required|array',
            'document.meta.artifacts.*.type' => 'required|string',
            'document.meta.artifacts.*.id' => 'required',
            'document.meta.message' => 'string',
            'document.country_codes' => 'required|array',
            'document.country_codes.*' => 'string',
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors());
        }
    }

    public function validateServiceDocumentMessage($data) {
        $validator = Validator::make($data, [
            'message_id' => 'required',
            'workflow_id' => 'required',
            'document_id' => 'required',
            'sender_operator' => 'required|array',
            'sender_operator.id' => 'required',
            'recipient_operator' => 'required|array',
            'recipient_operator.id' => 'required',
            'sender' => 'required|array',
            'sender.id' => 'required',
            'recipient' => 'required|array',
            'recipient.id' => 'required',
            'service_message' => 'required|array',
            'service_message.code' => 'required',
            'service_message.content' => 'nullable',
            'service_message.payload' => 'required|array',
            'service_message.payload.*.ticket_id' => 'required|string',
            'service_message.payload.*.country_code' => 'required|string',
            'service_message.payload.*.result_code' => 'required|integer',
            'service_message.payload.*.result_message' => 'required|string',
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors());
        }
    }

    public function validateNotifyMessage($data) {
        $validator = Validator::make($data, [
            'notify_type' => 'required|string',
            'address' => 'required|string',
            'data' => 'required|array',

        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors());
        }
    }
}
