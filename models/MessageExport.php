<?php namespace RainLab\Translate\Models;

use Backend\Models\ExportModel;

/**
 * Message Export Model
 */
class MessageExport extends ExportModel
{
    /**
     * Called when data is being exported.
     * The return value should be an array in the format of:
     *
     *   [
     *       'db_name1' => 'Some attribute value',
     *       'db_name2' => 'Another attribute value'
     *   ],
     *   [...]
     *
     */
    public function exportData($columns, $sessionKey = null)
    {
        $messages = Message::all()->map(function($message) {
            return [
                'code' => $message->code,
                'message_data' => json_encode($message->message_data)
            ];
        });

        return $messages;
    }
}
