<?php

?>
            <footer>
                <p class="italic"><strong><a href="<?=ROOT_URL?>" title="Homeage">Mon blog</a></strong> MGLSI_NEWS &nbsp; | &nbsp;
                <?php if (!empty($_SESSION['is_logged'])): ?>
                    Vous êtes connecté en tant que ADMIN- <a href="<?=ROOT_URL?>?p=admin&amp;a=logout">Se déconnecter</a> &nbsp; | &nbsp;
                    <a href="<?=ROOT_URL?>?p=blog&amp;a=all">Regarder tous les articles</a>
                    <a href="<?=ROOT_URL?>?p=editeur&amp;a=all">Regarder liste editeurs</a>
                <?php else: ?>
                    <a href="<?=ROOT_URL?>?p=admin&amp;a=login">Connexion  Admin</a>
                <?php endif ?>
                </p>
            </footer>
        </div>
    </body>
</html>
