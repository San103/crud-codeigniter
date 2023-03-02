<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';
    protected $allowedFields = ['title', 'slug', 'body', 'image_url'];


    public function getNews($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function deleteNews($id)
    {
        return $this->builder()->delete(['id' => $id]);
    }
    public function update_news($id, $data)
    {
        return $this->update(['id' => $id], $data);
    }
    public function searchNews($keyword)
    {
        // Perform the search by checking if the keyword appears in the title or body of a news item
        return $this->like('title', $keyword)
            ->orLike('body', $keyword)
            ->findAll();
    }
}
