<?php

namespace App\Controllers;

use App\Models\Tweet as ModelsTweet;

class Tweet extends BaseController
{

    var $categories;
    var $sess;
    var $curUser;
    var $tweet;

    public function __construct()
    {
        $this->categories = (new \Config\AdtConfig())->getCategories();
        $this->sess = session();
        $this->curUser = $this->sess->get('currentuser');
        $this->tweet = new ModelsTweet();
    }

    public function index()
    {
        $data['categories'] = $this->categories;
        $data['judul'] = 'Tweet Terbaru';
        $data['tweet'] = $this->tweet->where(['category' => $this->categories])->findAll();

        return view('tweet_home', $data);
    }

    public function category($category)
    {
        $data['categories'] = $this->categories;
        $data['judul'] = 'Tweet Kategori #' . $category;

        return view('tweet_home', $data);
    }

    public function addForm()
    {
        $data['categories'] = $this->categories;
        return view('tweet_add', $data);
    }

    public function editForm($tweet_id)
    {
        $data['categories'] = $this->categories;
        return view('tweet_edit', $data);
    }

    public function addTweet()
    {
        $save = $this->tweet->save($this->request->getVar());
        if ($save) {
            return "Sukses";
        } else {
            return "Gagal";
        }
        return redirect()->to('/');
    }

    public function delTweet($tweet_id)
    {
        return redirect()->to('/');
    }

    public function editTweet()
    {
        return redirect()->to('/');
    }
}
