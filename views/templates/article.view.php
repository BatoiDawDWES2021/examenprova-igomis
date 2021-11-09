<article class="style<?= $key+1 ?>">
    <span class="image">
        <img src="images/pic<?= ($key<9)?'0'.$key+1:$key+1 ?>.jpg" alt="" />
    </span>
    <a href="votes.php?id=<?= $album->getId() ?>">
        <h2><?= $album->getName() ?></h2>
        <div class="content">
            <p><?= $album->getArtistName() ?><br/><?= $album->getCompany(); ?></p>
        </div>
    </a>
</article>
