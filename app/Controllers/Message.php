<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Message as ModelsMessage;

class Message extends BaseController
{
    protected $message;
    public function __construct()
    {
        $this->message = new ModelsMessage();
    }
    public function send_message()
    {
        $user_id = $this->request->getVar("user_id");
        $receiver = $this->request->getVar("receiver");
        $content = $this->request->getVar("content");

        $data = [
            "user_id" => $user_id,
            "receiver" => $receiver,
            "content" => $content,
        ];

        $save = $this->message->save($data);
        if ($save) {
            return "Sukses";
        } else {
            return "Gagal";
        }
    }
    public function baca_pesan()
    {
        $user_id = $this->request->getVar("user_id");
        $data = $this->message->where(['user_id' => $user_id])->findAll();
        if ($data) {
            return $data;
        } else {
            return [];
        }
    }
}
