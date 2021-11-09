<h2>Menu</h2>
<ul>
    <?php

        foreach ($menu as $option):
            if (Auth() == $option['auth']): ?>
                <li><a href="<?= $option['link'] ?>"><?= $option['text'] ?></a></li>
        <?php endif;
            endforeach;
         ?>
</ul>