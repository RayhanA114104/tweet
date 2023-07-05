<?php

namespace App\Controllers;

class Tweet extends BaseController
{
    
    var $categories;
    var $sess;
    var $curUser;

    public function __construct()
    {
        $this->categories = (new \Config\AdtConfig())->getCategories();
        $this->sess = session();
        $this->curUser = $this->sess->get('currentuser');
    }
    
    public function index()
    {       
        $data['categories'] = $this->categories;
        $data['judul'] = 'Tweet Terbaru';

        return view('tweet_home', $data);
    }

    public function category($category)
    {
        $data['categories'] = $this->categories;
        $data['judul'] = 'Tweet Kategori #'.$category;

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