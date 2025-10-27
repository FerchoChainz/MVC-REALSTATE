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
    <a href="/seller/create" class="button green-btn">New Seller</a>
    <a href="/blog/create" class="button green-btn">New Blog Post</a>

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
                        <form action="/property/delete" method="POST" class="w-100">
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


    <h2>Sellers</h2>

    <table class="properties">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Last name</th>
                <th>Phone number</th>
                <th>Actions</th>
            </tr>
        </thead>


        <tbody> <!-- Show results -->
            <?php foreach ($sellers as $seller): ?>
                <tr>
                    <td><?php echo $seller->id; ?></td>
                    <td><?php echo $seller->name; ?></td>
                    <td><?php echo $seller->last_name; ?></td>
                    <td><?php echo $seller->phone_number; ?></td>
                    <td>
                        <form action="/seller/delete" method="POST" class="w-100">
                            <input type="submit" value="Delete" class="red-btn-b">
                            <input type="hidden" name="id" value="<?php echo $seller->id; ?>">
                            <input type="hidden" name="type" value="seller">
                        </form>


                        <a href="seller/update?id=<?php echo $seller->id; ?>" class="blue-btn-b">Update</a>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>

</main>