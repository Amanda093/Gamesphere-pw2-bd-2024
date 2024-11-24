<header>
    <div class="container navbar">
        <a href="../pages/main.php">
            <div class="logo"><img src="..//img/gamesphere-branco.png" id="logo" alt="Logo Gamesphere" /></div>
        </a>
        <div class="links">
            <a href="../pages/crud1.php" class="<?php if ($activePage == 'Crud1') {
                echo 'pagatual';
            } else {
                echo 'a-under';
            } ?>">Produto</a>
            <a href="../pages/crud2.php" class="<?php if ($activePage == 'Crud2') {
                echo 'pagatual';
            } else {
                echo 'a-under';
            } ?>">Crud2</a>
            <a href="../pages/crud3.php" class="<?php if ($activePage == 'Crud3') {
                echo 'pagatual';
            } else {
                echo 'a-under';
            } ?>">Crud3</a>
        </div>
    </div>
</header>