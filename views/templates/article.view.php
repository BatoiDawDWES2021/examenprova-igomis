<article class="style<?= $key ?>">
    <span class="image">
        <img src="images/pic0<?= $key ?>.jpg" alt="" />
    </span>
    <a href="votes.php?id=<?= $key ?>">
        <h2><?= $album->getName() ?></h2>
        <div class="content">
            <p><?= $album->getArtistName() ?><br/><?= $album->getCompany(); ?></p>
        </div>
    </a>
</article>
