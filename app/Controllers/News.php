<?php

namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class News extends BaseController
{
    public function index()
    {
        $model = model(NewsModel::class);

        $data = [
            'news'  => $model->getNews(),
            'title' => 'News archive',
        ];

        return view('templates/header', $data)
            . view('news/index')
            . view('templates/footer');
    }

    public function view($slug = null)
    {
        $model = model(NewsModel::class);

        $data['news'] = $model->getNews($slug);

        if (empty($data['news'])) {
            throw new PageNotFoundException('Cannot find the news item: ' . $slug);
        }

        //$data['title'] = $data['news']['title'];
        $data['image_url'] = base_url('uploads/' . $data['news']['image_url']);
        return view('templates/header', ['title' => $data['news']['title']])
            . view('news/view',$data)
            . view('templates/footer');
    }

    public function create()
    {
        helper('form');

        // Checks whether the form is submitted.
        if (!$this->request->is('post')) {
            // The form is not submitted, so returns the form.
            return view('templates/header', ['title' => 'Create News item'])
                . view('news/create')
                . view('templates/footer');
        }

        // Handle the uploaded image file
        $image = $this->request->getFile('image');
        if (!$image->isValid()) {
            // Handle error
            return redirect()->back()->withInput()->with('error', $image->getErrorString());
        }

        $post = $this->request->getPost();

        // Checks whether the submitted data passed the validation rules.
        if (!$this->validateData($post, [
            'title' => 'required|max_length[255]|min_length[3]',
            'body'  => 'required|max_length[5000]|min_length[10]',
        ])) {
            // The validation fails, so returns the form.
            return view('templates/header', ['title' => 'Creates News item'])
                . view('news/create')
                . view('templates/footer');
        }

        $model = model(NewsModel::class);

        // Save the uploaded image file to the server
        $newName = $image->getRandomName();
        $image->move('./public/uploads', $newName);

        $model->save([
            'title' => $post['title'],
            'slug'  => url_title($post['title'], '-', true),
            'body'  => $post['body'],
            'image_url' => $newName // Save the image file name to the database
        ]);

        return redirect('news');
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $model = model(NewsModel::class);
        $model->deleteNews($id);
        return redirect()->to('/news');
    }
    public function edit($id)
    {
        helper('form');
        $newsModel = new NewsModel();

        $news = $newsModel->find($id);

        // Check if the news item exists
        if (!$news) {
            throw new PageNotFoundException('Cannot find the news item: ' . $id);
        }

        // Check if the form has been submitted
        if ($this->request->is('post')) {

            // Validate the form data
            $post = $this->request->getPost();
            if (!$this->validateData($post, [
                'title' => 'required|min_length[3]',
                'body' => 'required',
            ])) {
                $data['validation'] = $this->validator;
                $data['news'] = $news;
                return view('templates/header', ['title' => 'Edit News'])
                    . view('news/edit', $data)
                    . view('templates/footer');
            }

            $post = $this->request->getPost();
            // Update the news item
            $data = [
                'title' => $post['title'],
                'slug' => url_title($post['title'], '-', true),
                'body' => $post['body'],
            ];
            $newsModel->update_news($id, $data);

            // Redirect to the news list page
            return redirect()->to('/news');
        }

        // Display the update form
        $data['news'] = $news;
        return view('templates/header', ['title' => 'Edit News'])
            . view('news/edit', $data)
            . view('templates/footer');
    }
    public function search()
    {
        $model = model(NewsModel::class);

        $keyword = $this->request->getVar('keyword');

        $data = [
            'news'  => $model->searchNews($keyword),
            'title' => 'Search Results',
        ];

        return view('templates/header', $data)
            . view('news/index')
            . view('templates/footer');
    }
}
