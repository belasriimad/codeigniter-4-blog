<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = "post";
    protected $useTimestamps = true;
    protected $returnType    = 'App\Entities\Post';
    protected $validationRules    = [
        'title'     => 'required|min_length[3]',
        'description' => 'required|min_length[10]'
    ];

    protected $validationMessages = [
        'title'        => [
            'required' => 'Le champ titre est obligatoire',
            'min_length' => 'Le champ titre doit contenir au moins 3 caractéres'
        ],
        'description' => [
            'required' => 'Le champ description est obligatoire',
            'min_length' => 'Le champ description doit contenir au moins 10 caractéres'
        ]
    ];

    protected $allowedFields = ["title", "description", "user_id", "post_image"];

    public function getUserPosts($user_id)
    {
        return $this->where('user_id', $user_id)
            ->orderBy("created_at", "DESC")
            ->findAll();
    }
}
