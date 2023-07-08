<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TweetLike as ModelsTweetLike;

class TweetLike extends BaseController
{
    protected $tweet_like;
    public function __construct()
    {
        $this->tweet_like = new ModelsTweetLike();
    }
    public function read_like()
    {
        $user_id = $this->request->getVar("tweet_id");
        $data = $this->tweet_like->where(['tweet_id' => $user_id])->countAllResults(false);
        if ($data) {
            return $data;
        } else {
            return [];
        }
    }

    public function add_like()
    {
        $user_id = $this->request->getVar("user_id");
        $tweet_id = $this->request->getVar("tweet_id");

        $data = [
            "user_id" => $user_id,
            "tweet_id" => $tweet_id,
        ];

        $save = $this->tweet_like->save($data);
        if ($save) {
            return "Sukses";
        } else {
            return "Gagal";
        }
    }
}
