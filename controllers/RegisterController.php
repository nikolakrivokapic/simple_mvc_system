<?php


class RegisterController {

protected static $errors;

    public function index() {

    if(self::validate()) {


            $email = $_POST['email'];
            $name = $_POST['name'];
            $password = $_POST['password'];

            if(User::exists($email)) {
                // if user already exists
                $_SESSION['error'] = 'User with this email already exists';
                header("location: index.php?page=register");
            } else {
                if (User::create($name, $email, $password)) {
                        $user = User::getUser($email);
                        $_SESSION['logged'] = true;
                        $_SESSION['user'] = $user->name;

                        header("location: index.php");
                }
            }


        } else {
            // Validation errors
            $_SESSION['errors'] = self::$errors;

           header("location: index.php?page=register");
        }

  }

 private static function validate() {
        $v = new Valitron\Validator($_POST);
        $v->rule('required', ['name', 'email', 'password', 'confirmPassword']);
        $v->rule('email', 'email');
        $v->rule('equals', 'password', 'confirmPassword');
        $result = $v->validate();
        if ($v->errors()) self::$errors = $v->errors();
        return $result;

    }

 }

    ?>
