<main class="container section">
    <h1>Create a new Property</h1>

    <a href="/admin" class="button green-btn">Go Back</a>

    <?php foreach ($errors as $error): ?>
        <div class="alert error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="form" method="POST" enctype="multipart/form-data">

        <?php include __DIR__ . '/form.php'; ?>
        
        <input type="submit" value="Create Propertie" class="button green-btn">
    </form>

</main>