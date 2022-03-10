<?php

namespace App\Controller;

use Cacofony\BaseClasse\BaseController;
use App\Manager\UserManager;
use ErrorException;

class UserController extends BaseController
{
    /**
     * @Route(path="/users", name="listUsers")
     * @param UserManager $userManager
     * @return void
     */
    public function getUsers(UserManager $userManager)
    {
        $users = $userManager->findAllUsers();

        $this->render('Frontend/User/show_all', ['users' => $users], 'Liste des utilisateurs');
    }

    /**
     * @Route(path="/user/{id}", name="showOneUser")
     * @param int $id
     * @param UserManager $userManager
     * @return void
     */
    public function getUser(int $id, UserManager $userManager)
    {
        $user = $userManager->findById($id);

        $this->render('Frontend/User/show_user', ['user' => $user], 'Utilisateur: ' . $user->getFirstName());
    }

    /**
     * @Route(path="/register", name="register")
     * @return void
     */
    public function getRegister()
    {
        $this->render('Frontend/Auth/register', ['message' => null], 'Register: ');
    }

    /**
     * @Route(path="/postRegister", name="postRegister")
     * @param UserManager $userManager
     * @return void
     */
    public function postRegister(UserManager $userManager)
    {
        try {
            $message = $userManager->register($_POST['email'], $_POST['password'], $_POST['firstName'], $_POST['lastName'], 0);
        } catch (ErrorException $error) {
            $message = $error->getMessage();
        }

        $this->render('Frontend/Auth/register', ['message' => $message], 'Register: ');
    }

    /**
     * @Route(path="/postLogin", name="postLogin")
     * @param UserManager $userManager
     * @return void
     */
    public function postLogin(UserManager $userManager)
    {
        try {
            $message = $userManager->login($_POST['email'], $_POST['password']);
        } catch (ErrorException $error) {
            $message = $error->getMessage();
        }

        $this->render('Frontend/Auth/login', ['message' => $message], 'Login: ');
    }
}
