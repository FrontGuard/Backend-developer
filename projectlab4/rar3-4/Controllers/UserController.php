<?php
// Controllers/UserController.php
namespace Controllers;

use Models\UserModel;

class UserController {
    public function getUserInfo() {
        $userModel = new UserModel();
        return $userModel->getUser();
    }
}
?>
