<main class="container section">
    <h1>Admin RealState</h1>

    <?php
    if ($result) {
        $message = showDialogMessage(intval($result));
        if ($message['message']) { ?>
            <p class="<?php echo $message['class']; ?>">
                <?php echo s($message['message']); ?>
            </p>
        <?php } ?>
    <?php } ?>



    <a href="/property/create" class="button green-btn">New Propertie</a>
    <a href="/property/update" class="button green-btn">New Seller</a>

    <h2>Properties</h2>


    <table class="properties">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tittle</th>
                <th>Image</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>


        <tbody> <!-- Show results -->
            <?php foreach ($properties as $propertie): ?>
                <tr>
                    <td><?php echo $propertie->id; ?></td>
                    <td><?php echo $propertie->tittle; ?></td>
                    <td><img src="/images/<?php echo $propertie->image; ?>" alt="" class="table-img"></td>
                    <td><?php currency($propertie->price); ?></td>
                    <td>
                        <form action="" method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propertie->id; ?>">
                            <input type="hidden" name="type" value="propertie">

                            <input type="submit" value="Delete" class="red-btn-b">
                        </form>


                        <a href="/property/update?id=<?php echo $propertie->id; ?>" class="blue-btn-b">Update</a>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</main>