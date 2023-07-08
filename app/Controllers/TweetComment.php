<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TweetComment as ModelsTweetComment;

class TweetComment extends BaseController
{
    protected $tweet_comment;
    public function __construct()
    {
        $this->tweet_comment = new ModelsTweetComment();
    }
    public function read_comment()
    {
        $tweet_id = $this->request->getVar("tweet_id");
        $data = $this->tweet_comment->where(['tweet_id' => $tweet_id])->findAll();
        if ($data) {
            return $data;
        } else {
            return [];
        }
    }
    public function add_comment()
    {
        $save = $this->tweet_comment->save($this->request->getVar());
        if ($save) {
            return "Sukses";
        } else {
            return "Gagal";
        }
    }

    public function delete_comment()
    {
    }
}
