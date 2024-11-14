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
            <h3>nowy produkt</h3>
            <?php echo htmlentities($action) ?>
        </div>

        <div class="footer">

        </div>
    </body>
</html>