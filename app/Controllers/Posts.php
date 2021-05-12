<?php

namespace App\Controllers;

use App\Entities\Post;
use App\Models\PostModel;
use App\Models\UserModel;

class Posts extends BaseController
{
    private $model;
    private $user_id;

    public function __construct()
    {
        $this->model = new PostModel;
        $this->user_id = session("user_id");
    }

    public function index()
    {
        $posts =  $this->model->getUserPosts($this->user_id);
        return view('posts/index', [
            "posts" => $posts,
            "controller" => $this
        ]);
    }

    public function show($id)
    {
        $post = $this->model->find($id);
        $owner = $post->user_id === session("user_id");
        if (!$post) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("L'article $id est introuvable !");
        }
        return view('posts/show', [
            "post" => $post,
            "owner" => $owner,
            "controller" => $this
        ]);
    }

    public function create()
    {
        return view('posts/create');
    }

    public function store()
    {
        //check input file not empty
        $file = $this->request->getFile('image');
        if (!$file->isValid()) {
            $error_code = $file->getError();
            if ($error_code == UPLOAD_ERR_NO_FILE) {
                return redirect()->back()
                    ->with('error', "Veuillez choisir une image !")
                    ->withInput();
            }
        }
        //check file size
        $fileSize = $file->getSizeByUnit("mb");
        if ($fileSize > 2) {
            return redirect()->back()
                ->with('error', "La taille du fichier ne doit pas dépasser 2MB!")
                ->withInput();
        }
        //check file type (png,jpg,jpeg)
        $type = $file->getMimeType();
        $types = ["image/png", "image/jpg", "image/jpeg"];
        if (!in_array($type, $types)) {
            return redirect()->back()
                ->with('error', "Veuillez choisir une image valide")
                ->withInput();
        }
        //upload the valid file
        $file->move("./posts_images");
        $post = new Post($this->request->getPost());
        $post->user_id = session("user_id");
        $post->post_image = $file->getName();
        $added = $this->model->insert($post);
        if ($added) {
            return redirect()->to("/posts")->with("success", "Article ajouté avec succés");
        } else {
            return redirect()->back()
                ->with('errors', $this->model->errors())
                ->withInput();
        }
    }


    public function edit($id)
    {
        $post = $this->model->find($id);
        if ($post->user_id === session("user_id")) {
            $this->model->delete($id);
            return view('posts/edit', ["post" => $post]);
        }
        return redirect()->to("/");
    }

    public function update($id)
    {
        $post = $this->model->find($id);
        $post->fill($this->request->getPost());

        if ($post->user_id === session("user_id")) {
            if ($post->hasChanged('title') || $post->hasChanged('description')) {
                if ($this->model->save($post)) {
                    return redirect()->to("/posts")->with("success", "Article modifié avec succés");
                } else {
                    return redirect()->back()
                        ->with('errors', $this->model->errors())
                        ->withInput();
                }
            } else {
                return redirect()->back()
                    ->with('error', "Aucun changement effectué !")
                    ->withInput();
            }
        } else {
            return redirect()->to("/");
        }
    }

    public function delete($id)
    {
        $post = $this->model->find($id);

        if (!$post) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("L'article $id est introuvable !");
        }


        if ($post->user_id === session("user_id")) {
            $this->model->delete($id);
            return redirect()->to("/posts")->with("success", "Article supprimé avec succés");
        }
        return redirect()->to("/");
    }

    public function getUserById($id)
    {
        $userModel = new UserModel;
        $user = $userModel->find($id);
        return $user->name;
    }
}
