<?php require_once 'app/views/templates/header.php' ?>
<main role="main" class="container mt-5 flex-grow-1">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Hey <?php echo $_SESSION['username']; ?> 👋</h1>
                <p class="lead"> <?= date("F jS, Y"); ?></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <p> <a href="/logout">Click here to logout</a></p>
        </div>
    </div>
</main>

    <?php require_once 'app/views/templates/footer.php' ?>
