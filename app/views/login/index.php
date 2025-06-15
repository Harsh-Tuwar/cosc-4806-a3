	<?php require_once 'app/views/templates/headerPublic.php' ?>

	<main role="main" class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-6">

				<div class="text-center mb-4">
					<h1 class="h3">You are not logged in</h1>
				</div>

				<?php if (isset($_SESSION['login_error'])): ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<?php echo $_SESSION['login_error']; ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				<?php endif; ?>

				<div class="card shadow-sm">
					<div class="card-body">
						<form action="/login/verify" method="post">
							<div class="mb-3">
								<label for="username" class="form-label">Username</label>
								<input required type="text" class="form-control" name="username" id="username">
							</div>

							<div class="mb-3">
								<label for="password" class="form-label">Password</label>
								<input required type="password" class="form-control" name="password" id="password">
							</div>

							<div class="d-grid gap-2">
								<button type="submit" class="btn btn-primary">Login</button>
								<a href="/create" class="btn btn-outline-secondary">Create an account</a>
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</main>

	<?php require_once 'app/views/templates/footer.php' ?>
