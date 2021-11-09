<div class="inner">
    <header>
        <h1>This is Best Ever Music</h1>
        <p>This WEEK you can VOTE for THIS ALBUMS</p>
    </header>
    <section class="tiles">
        <?php
            foreach ($albums as $key => $album){
                loadTemplate('templates.article',compact('key','album'));
            }
        ?>
    </section>
</div>