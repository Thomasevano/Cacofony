<?php

namespace Cacofony\Helper;

use Cacofony\Factory\PDOFactory;
use Firebase\JWT\JWT;
use App\Manager\UserManager;

class AuthHelper
{
    public static function isLoggedIn(): bool
    {
        if (!isset($_SESSION['user_badge'])) {
            return false;
        }

        try {
            JWT::decode($_SESSION['user_badge'], $_ENV['APP_SECRET'], ['HS256']);
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    // TODO - This method should return an User entity
    public static function getLoggedUser(): object|bool
    {
        try {
            if (!isset($_SESSION['user_badge'])) {
                return false;
            }
            $user = JWT::decode($_SESSION['user_badge'], $_ENV['APP_SECRET'], ['HS256']);
            $userManager = new UserManager(PDOFactory::getInstance());
            $user = $userManager->findByEmail($user->userName);
        } catch (\Exception $e) {
            return false;
        }
        return $user;
    }

    public static function login(array $userInfos)
    {

    }

    public static function logout(): void
    {
        session_destroy();
    }
}