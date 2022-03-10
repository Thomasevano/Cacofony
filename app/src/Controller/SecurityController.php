<?php

namespace App\Controller;

use Cacofony\BaseClasse\BaseController;
use Cacofony\Helper\AuthHelper;
use Firebase\JWT\JWT;
use App\Manager\UserManager;

class SecurityController extends BaseController
{
    /**
     * @Route(path="/login")
     * @return void
     */
    public function getLogin()
    {
        $this->render('Frontend/Auth/login', [], 'Please login');
    }

    /**
     * @Route(path="/login")
     * @param UserManager $userManager
     * @return void
     */
    public function postLogin(UserManager $userManager)
    {
        $user = $userManager->login($_POST['email'], $_POST['password']);
        $secretKey  = $_ENV['APP_SECRET'];
        $issuedAt   = new \DateTimeImmutable();
        $expire     = $issuedAt->modify('+30 day')->getTimestamp();
        $serverName = $_SERVER['SERVER_NAME'];

        $data = [
            'iat'  => $issuedAt->getTimestamp(),         // Issued at:  : heure à laquelle le jeton a été généré
            'iss'  => $serverName,                       // Émetteur
            'nbf'  => $issuedAt->getTimestamp(),         // Pas avant..
            'exp'  => $expire,                           // Expiration
            'userName' => $user->getEmail(),                     // Nom d'utilisateur
        ];

        if (!$user) {
            return false;
        } else {
            $jwt = JWT::encode($data, $secretKey);
            $_SESSION['user_badge'] = $jwt;
            $this->HTTPResponse->redirect('/');
        }
        // TODO - Validate credentials for real in DB and fill the payload with more infos
    }

    /**
     * @Route(path="/logout")
     * @return void
     */
    public function getLogout()
    {
        AuthHelper::logout();
        $this->HTTPResponse->redirect('/');
    }
}