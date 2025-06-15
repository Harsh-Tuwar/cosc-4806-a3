    <?php require_once 'app/views/templates/headerPublic.php' ?>

    <main role="main" class="container mt-5 flex-grow-1">
      <div class="row justify-content-center">
        <div class="col-md-6">

          <div class="text-center mb-4">
            <h1 class="h3">Let's create your account!</h1>
          </div>

          <?php if (isset($_SESSION['signup_error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['signup_error']; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php endif; ?>

          <div class="card shadow-sm">
            <div class="card-body">
              <form action="/create/new_account" method="post">
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input required type="text" class="form-control" name="username" id="username">
                </div>

                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input required type="password" class="form-control" name="password" id="password">
                </div>

                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-primary">Create Account</button>
                  <a href="/login" class="btn btn-outline-secondary">Already have an account? Sign in</a>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </main>

    <?php require_once 'app/views/templates/footer.php' ?>
