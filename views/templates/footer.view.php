<div class="inner">
    <section>
        <h2>Identify for vote</h2>
        <form method="post" action="index.php">
            <div class="fields">
                <div class="field half">
                    <input type="text" name="name" id="name" placeholder="Name" />
                </div>
                <div class="field half">
                    <input type="email" name="email" id="email" placeholder="Email" />
                </div>
                <div class="field">
                    <textarea name="message" id="message" placeholder="Message"></textarea>
                </div>
            </div>
            <ul class="actions">
                <li><input type="submit" value="Send" class="primary" /></li>
            </ul>
        </form>
    </section>
    <section>
        <h2>Last Missage</h2>
        <p>
            <?= $lastMessage ?>
        </p>
    </section>
    <ul class="copyright">
        <li>&copy; Untitled. All rights reserved</li>
    </ul>
</div>