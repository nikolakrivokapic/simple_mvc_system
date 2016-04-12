<?php


class SearchController {

        public function index() {
            if($_SESSION['logged'] == true) {

            $search = trim(strip_tags( $_POST['search']));

            $results = User::search($search);
            $_SESSION['results'] = $results;
           
            }
            else {
            $_SESSION['error'] = 'Please login to use search';
            header("location: index.php?page=login");
            }
          }
}

    ?>
