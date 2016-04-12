<?php


class LoginController {

protected static $errors;

    public function index() {

    if(self::validate()) {

            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = User::getUser($email);

            // Check if user exists
            if(empty($user)) {
               $_SESSION['error'] = 'No user with this email';
                header("location: index.php?page=login");
            } else {
                    if (password_verify($password, $user->password)) {
                    $_SESSION['logged'] = true;
                    $_SESSION['user'] = $user->name;
                    header("location: index.php");
                } else {

                    $_SESSION['logged'] = false;
                    $_SESSION['error'] = 'Wrong Password';
                    header("location: index.php?page=login");
                }
            }

        } else {
            // Validation errors
            $_SESSION['logErrors'] = self::$errors;
            header("location: login.php");
        }
   }

 private static function validate() {
        $v = new Valitron\Validator($_POST);
        $v->rule('required', ['email', 'password']);
        $v->rule('email', 'email');
        $result = $v->validate();
        if ($v->errors()) self::$errors = $v->errors();
        return $result;

    }
}
    ?>
