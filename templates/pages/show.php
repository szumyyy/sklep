<div class="show">
  <?php $product = $params['product'] ?? null; ?>
  <?php if ($product) : ?>
    <ul>
      <li>Id: <?php echo $product['id'] ?></li>
      <li>Tytuł: <?php echo $product['name'] ?></li>
      <li>
        <pre><?php echo $product['description'] ?></pre>
      </li>
      <li>Zapisano: <?php echo $product['created_at'] ?></li>
    </ul>
    <a href="/sklep/?action=edit&id=<?php echo $product['id'] ?>">
      <button>Edytuj</button>
    </a>
  <?php else : ?>
    <div>Brak produktu do wyświetlenia</div>
  <?php endif; ?>
  <a href="/sklep/">
    <button>Powrót do listy notatek</button>
  </a>
</div>