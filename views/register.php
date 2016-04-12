<h2>Registration</h2>


<?php if (isset($_SESSION['error'])): ?> <label class="red" for="inputEmail"><?= $_SESSION['error'] ?>. </label> <?php endif; ?>

<form class="form-horizontal" method="post" action="index.php?action=register" >
            <div class="form-group">
      <label for="name" class="col-xs-2 alignleft">Name:</label>
      <div class="col-xs-4">
      <input class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>">
      </div>
                 <?php if (!empty($_SESSION['errors']['name'])): ?>
                    <?php foreach ($_SESSION['errors']['name'] as $index=>$msg): ?>
                <label class="red" for="inputEmail"><?= $msg ?>. </label>
                    <?php endforeach; ?>
                <?php endif; ?>
 </div>
    <div class="form-group">
      <label for="email" class="col-xs-2 alignleft">Email:</label>
      <div class="col-xs-4">
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
      </div>
                <?php if (!empty($_SESSION['errors']['email'])): ?>
                    <?php foreach ($_SESSION['errors']['email'] as $index=>$msg): ?>
                <label class="red" for="inputEmail"><?= $msg ?>. </label>
                    <?php endforeach; ?>
                <?php endif; ?>
 </div>




    <div class="form-group">
      <label for="pwd"  class="col-xs-2 alignleft" >Password:</label>
          <div class="col-xs-4">
      <input type="password" class="form-control" name="password" id="pwd" placeholder="Enter password">
      </div>
                       <?php if (!empty($_SESSION['errors']['password'])): ?>
                    <?php foreach ($_SESSION['errors']['password'] as $index=>$msg): ?>
                <label class="red" for="inputEmail"><?= $msg ?>. </label>
                    <?php endforeach; ?>
                <?php endif; ?>
    </div>

        <div class="form-group">
      <label for="pwd"  class="col-xs-2 alignleft">Confirm Password:</label>
          <div class="col-xs-4">
      <input type="password"  name="confirmPassword" class="form-control" id="pwd" placeholder="Confirm password">
      </div>
                       <?php if (!empty($_SESSION['errors']['confirmPassword'])): ?>
                    <?php foreach ($_SESSION['errors']['confirmPassword'] as $index=>$msg): ?>
                <label class="red" for="inputEmail"><?= $msg ?>. </label>
                    <?php endforeach; ?>
                <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-success">REGISTER</button>
  </form>

 <?php session_destroy(); ?>

  <style>
.alignleft {
     padding-top: 7px;

text-align:left;
}
</style>
