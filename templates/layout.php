<html lang="pl">

<head>

</head>

<body class="body">
  <div class="wrapper">
    <div class="header">
      <h1><i class="far fa-clipboard"></i>Moje produkty</h1>
    </div>

    <div class="container">
      <div class="menu">
        <ul>
          <li><a href="/sklep/">Strona główna</a></li>
          <li><a href="/sklep/?action=create">Nowy produkt</a></li>
        </ul>
      </div>

      <div class="page">
        <?php require_once("templates/pages/$page.php"); ?>
      </div>
    </div>

    <div class="footer">
      <p>abcdxyz</p>
    </div>
  </div>
</body>

</html>