<main class="container section">
    <h1>Update</h1>

    <?php foreach ($errors as $error): ?>
        <div class="alert error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="form" method="POST" enctype="multipart/form-data">

        <?php include __DIR__ . '/form.php'; ?>
        
        <input type="submit" value="Update Propertie" class="button green-btn">

    </form>

</main>