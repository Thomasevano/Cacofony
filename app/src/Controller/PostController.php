<?php

namespace App\Controller;

use Cacofony\BaseClasse\BaseController;
use App\Manager\PostManager;
use App\Service\ExampleService;

class PostController extends BaseController
{
    /**
     * @Route(path="/", name="homePage")
     * @param PostManager $postManager
     * @param ExampleService $service
     * @return void
     */
    public function getHome(PostManager $postManager, ExampleService $service)
    {
        $posts = $postManager->findAllPosts();

        $this->render('Frontend/home', ['posts' => $posts], 'le titre de la page');
    }

    /**
     * @Route(path="/article/{id}", name="showOne")
     * @param int $id
     * @param PostManager $postManager
     * @return void
     */
    public function getShow(int $id, PostManager $postManager)
    {
        $post = $postManager->findById($id);

        if (!$post) {
            $this->HTTPResponse->redirect('/');
        }
        $this->render('Frontend/Post/show_post', ['post' => $post], 'le titre de la page');
    }

    /**
     * @Route(path="/article/delete/{id}", name="deleteOnePost")
     * @param int $id
     * @param PostManager $postManager
     * @return void
     */
    public function getDeletePost(int $id, PostManager $postManager)
    {
        $post = $postManager->delete($id);

        $this->render('Frontend/Post/test', ['post' => $id], 'Utilisateur: ');
    }

    /**
     * @Route(path="/add-post", name="addPost")
     * @param PostManager $postManager
     * @return void
     */
    public function getAddPost(PostManager $postManager)
    {
        $post = $postManager->add($_POST['title'], $_POST['content']);

        $this->render('Frontend/Post/add_post', ['post' => $post], 'Création d\'un post: ');
    }

    /**
     * @Route(path="/show")
     * @return void
     */
    public function getShowTest()
    {
        $this->renderJSON(['message' => 'Je suis bien la bonne méthode']);
    }

    /**
     * @Route(path="/show")
     * @return void
     */
    public function postShowTest()
    {
        $this->renderJSON(['message' => 'Ca marche aussi en fonction de la méthode, testez moi !']);
    }
}