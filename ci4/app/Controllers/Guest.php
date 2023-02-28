<?php

namespace App\Controllers;

use App\Models\GuestModel;

class Guest extends BaseController
{
    public function index()
    {
        $model = model(GuestModel::class);

        $data = [
            'guest' => $model->getGuest(),
            'title' => 'Guestbook',
        ];    
        
        return view('templates/header', $data)
            . view('guest/index')
            . view('templates/footer');
   
    }
    
    public function view($slug = null)
    {
        $model = model(GuestModel::class);

        $data['guest'] = $model->getGuest($slug);

        if (empty($data['guest'])) {
            throw new PageNotFoundException('Cannot find the news item: ' . $slug);
        }

        $data['title'] = $data['guest']['title'];

        return view('templates/header', $data)
            . view('guest/view')
            . view('templates/footer');
    }





    public function create()
    {
        helper('form');

        // Checks whether the form is submitted.
        if (! $this->request->is('post')) {
            // The form is not submitted, so returns the form.
            return view('templates/header', ['title' => 'Create a news item'])
                . view('guest/create')
                . view('templates/footer');
        }

        $post = $this->request->getPost(['title', 'email', 'website', 'comment', 'gender']);

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validateData($post, [
            'title' => 'required|max_length[255]|min_length[3]',
            'email'  => 'required|max_length[5000]|min_length[10]',
            'website'  => 'required|max_length[5000]|min_length[3]',
            'comment'  => 'required|max_length[5000]|min_length[10]',
            'gender'  => 'required|max_length[5000]|min_length[3]',
        ])) {
            // The validation fails, so returns the form.
            return view('templates/header', ['title' => 'Create a news item'])
                . view('guest/create')
                . view('templates/footer');
        }

        $model = model(GuestModel::class);

        $model->save([
            'title' => $post['title'],
            'slug'  => url_title($post['title'], '-', true),
            'email'  => $post['email'],
            'website'  => $post['website'],
            'comment'  => $post['comment'],
            'gender'  => $post['gender'],

        ]);

        return view('templates/header', ['title' => 'Create a news item'])
            . view('guest/success')
            . view('templates/footer');
    }
}