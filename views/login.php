
  <h2>Login </h2>
 <?php if (!empty($_SESSION['error'])): ?>
  <label class="red"><?= $_SESSION['error'] ?>. </label>
  <?php endif; ?>
<form method="post"  class="form-horizontal" action="index.php?action=login">

    <div class="form-group">
      <label for="email"  class="col-xs-1 control-label" style="text-align:left;">Email:</label>
       <div class="col-xs-4">
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
      </div>
                <?php if (!empty($_SESSION['logErrors']['email'])): ?>
                    <?php foreach ($_SESSION['errors']['email'] as $index=>$msg): ?>
                <label class="red" for="inputEmail"><?= $msg ?>. </label>
                    <?php endforeach; ?>
                <?php endif; ?>
 </div>


    <div class="form-group">
      <label for="pwd"  class="col-xs-1 control-label" style="text-align:left;">Password:</label>
      <div class="col-xs-4">
      <input type="password" class="form-control" name="password" id="pwd" placeholder="Enter password">
      </div>
                       <?php if (!empty($_SESSION['logErrors']['password'])): ?>
                    <?php foreach ($_SESSION['errors']['password'] as $index=>$msg): ?>
                <label class="red" for="inputEmail"><?= $msg ?>. </label>
                    <?php endforeach; ?>
                <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-success">Login</button>
  </form>

 <?php session_destroy(); ?>
