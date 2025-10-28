
<?php foreach($blog as $post) { ?>

<article class="blog-entry">
    <div class="image">
        <picture>
            <img src="/images/blog/<?php echo $post->image;?>" alt="Texto entrada blog" loading="lazy">
    </div>

    <div class="text-entry">
        <a href="/entry">
            <h4><?php echo $post->tittle; ?></h4>
            <p>Escrito el: <span><?php echo $post->date; ?> </span>por: <span><?php echo $post->author; ?></span></p>

            <p><?php echo $post->description; ?></p>
        </a>
    </div>
</article>
<?php } ?>