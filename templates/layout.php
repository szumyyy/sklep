<html>
    <head>
    </head>

    <body>
        <div class="header">
            <h1>Mój sklep</h1>
        </div>

        <div class="container">
            <div class="menu">
                <ul>
                    <li><a href="/">Lista produktów</a></li>
                    <li><a href="/?action=create">Nowy produkt</a></li>
                </ul>
            </div>
        </div>

        <div>
            <?php
            require_once("templates/pages/$page.php");
            ?>
        </div>

        <div class="footer">
            STOPKA
        </div>
    </body>
</html>