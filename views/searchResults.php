
<?php if(empty($_SESSION['results'])): // if results is empty ?>
<p> No matches.</p>

<?php else: ?>
<table class="table table-hover table-bordered results">
  <thead>
    <tr>
      <th>ID</th>
      <th class="col-md-5 col-xs-5">Name</th>
      <th class="col-md-4 col-xs-4">Email</th>
    </tr>

  </thead>
  <tbody>

       <?php foreach ($_SESSION['results'] as $user): // iterate through the results ?>
                 <tr>
                  <th scope="row"><?= $user['id'] ?></th>
                  <td><?= $user['name'] ?></td>
                  <td><?= $user['email'] ?></td>
                </tr>
       <?php endforeach; ?>

  <?php unset($_SESSION['results']); // reset this variable after writing to the screen ?>

  </tbody>
</table>
<?php endif; ?>