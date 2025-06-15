<?php require_once 'app/views/templates/header.php' ?>

<main class="container mt-5 flex-grow-1">
  <div class="row justify-content-center">
    <div class="col-md-8 text-center">
      <div class="card shadow-sm border-0">
        <div class="card-body py-5">
          <h1 class="display-5 mb-3">Hey, <?php echo htmlspecialchars($_SESSION['username']); ?> 👋</h1>
          <p class="lead text-muted mb-4"><?= date("F jS, Y"); ?></p>

          <a href="/logout" class="btn btn-outline-danger">
            Logout
          </a>
        </div>
      </div>
    </div>
  </div>
</main>

<?php require_once 'app/views/templates/footer.php' ?>
