<?php require_once 'app/views/templates/headerPublic.php'?>

<main role="main" class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Lets have an account created for you!</h1>
            </div>
        </div>
    </div>

    <?php if (isset($_SESSION['signup_error'])): ?>
        <div class="alert alert-danger">
            <?php echo $_SESSION['signup_error']; ?>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-sm-auto">
        <form action="/create/new_account" method="post" >
        <fieldset>
          <div class="form-group">
            <label for="username">Username</label>
            <input required type="text" class="form-control" name="username">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input required type="password" class="form-control" name="password">
          </div>
          <br>
        <div class="col-lg-12">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="/login" class="btn btn-info" role="button">Already have an account? Sign in.</a> 
        </div>
        </fieldset>
        </form> 
      </div>
    </div>

<?php require_once 'app/views/templates/footer.php' ?>
