<fieldset>
    <legend>Create Post Blog</legend>

    <label for="tittle">Tittle:</label>
    <input type="text" id="tittle" name="property[tittle]" placeholder="Post Tittle"
        value="<?php echo s($property->tittle); ?>">

    <label for="author">Author:</label>
    <input type="number" id="author" name="property[author]" placeholder="Propertie author"
        value="<?php echo s($property->author); ?>">

    <label for="image">Image:</label>
    <input type="file" id="image" name="property[image]" accept="image/jpeg, image/png">

    <?php if ($property->image): ?>
        <img src="/images/<?php echo $property->image ?>" alt="" class="small-img">
    <?php endif; ?>
</fieldset>

<fieldset>
    <legend>Content</legend>
    <label for="content">Post Content:</label>
    <textarea id="content" name="property[content]"><?php echo s($property->content); ?></textarea>
</fieldset>

