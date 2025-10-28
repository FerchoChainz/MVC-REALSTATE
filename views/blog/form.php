<fieldset>
    <legend>Create Post Blog</legend>

    <label for="tittle">Tittle:</label>
    <input type="text" id="tittle" name="blog[tittle]" placeholder="Tittle"
        value="<?php echo s($blog->tittle); ?>">

    <label for="author">Author:</label>
    <input type="text" id="author" name="blog[author]" placeholder="Author"
        value="<?php echo s($blog->author); ?>">

    <label for="image">Image:</label>
    <input type="file" id="image" name="blog[image]" accept="image/jpeg, image/png">

    <?php if ($blog->image): ?>
        <img src="/images/<?php echo $blog->image ?>" alt="" class="small-img">
    <?php endif; ?>

    <label for="description">Description:</label>
    <input type="text" name="blog[description]" id="blog[description]" placeholder="Post description"
    value="<?php echo s($blog->description) ?>"> 
</fieldset>

<fieldset>
    <legend>Content</legend>
    <label for="content">Description:</label>
    <textarea id="content" name="blog[content]"><?php echo s($blog->content); ?>
</textarea>
</fieldset>

