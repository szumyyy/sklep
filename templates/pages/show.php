<div class="show">
  <?php $product = $params['products'] ?? null; ?>
  <?php if ($product) : ?>
    <ul>
      <li>Id: <?php echo (int) $product['id'] ?></li>
      <li>Tytuł: <?php echo htmlentities($product['name']) ?></li>
      <li>
        <pre><?php echo htmlentities($product['description']) ?></pre>
      </li>
      <li>Zapisano: <?php echo htmlentities($product['created']) ?></li>
    </ul>
  <?php else : ?>
    <div>Brak produktów do wyświetlenia</div>
  <?php endif; ?>
  <a href="/sklep/">
    <button>Powrót do listy produktów</button>
  </a>
</div>