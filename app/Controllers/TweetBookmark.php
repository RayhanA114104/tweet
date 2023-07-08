<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TweetBookmark as ModelsTweetBookmark;

class TweetBookmark extends BaseController
{
    protected $bookmark;
    public function __construct()
    {
        $this->bookmark = new ModelsTweetBookmark();
    }
    public function read_bookmark()
    {
        $user_id = $this->request->getVar("user_id");
        $data = $this->bookmark->where(['user_id' => $user_id])->findAll();
        if ($data) {
            return $data;
        } else {
            return [];
        }
    }

    public function add_bookmark()
    {
        $user_id = $this->request->getVar("user_id");
        $tweet_id = $this->request->getVar("tweet_id");

        $data = [
            "user_id" => $user_id,
            "tweet_id" => $tweet_id,
        ];

        $save = $this->bookmark->save($data);
        if ($save) {
            return "Sukses";
        } else {
            return "Gagal";
        }
    }
}
