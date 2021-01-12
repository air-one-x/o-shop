<table>
    <tr>
        <?php

        foreach ($users as $user) : ?>
            <td>
                <p>NOM:<?= $user->getLastName(); ?></p>
                <p>PRENOM:<?= $user->getFirstName(); ?></p>
                <p>EMAIL:<?= $user->getEmail(); ?></p>
                <p>ROLE:<?= $user->getRole(); ?></p>
            </td>
        <?php endforeach; ?>
    </tr>
    <table>