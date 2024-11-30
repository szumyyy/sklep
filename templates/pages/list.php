<div class="list">
  <section>
    <div class="message">
      <?php
      if (!empty($params['error'])) {
        switch ($params['error']) {
          case 'missingProductId':
            echo 'Niepoprawny identyfikator produktu';
            break;
          case 'productNotFound':
            echo 'Produkt nie została znaleziona';
            break;
        }
      }
      ?>
    </div>
    <div class="message">
      <?php
      if (!empty($params['before'])) {
        switch ($params['before']) {
          case 'created':
            echo 'Produkt został utworzony';
            break;
          case 'edited':
            echo 'Produkt został zaktualizowany';
            break;
        }
      }
      ?>
    </div>

    <div class="tbl-header">
      <table cellpadding="0" cellspacing="0" border="0">
        <thead>
          <tr>
            <th>Id</th>
            <th>Tytuł</th>
            <th>Data</th>
            <th>Opcje</th>
          </tr>
        </thead>
      </table>
    </div>
    <div class="tbl-content">
      <table cellpadding="0" cellspacing="0" border="0">
        <tbody>
          <?php foreach ($params['products'] ?? [] as $product) : ?>
            <tr>
              <td><?php echo $product['id'] ?></td>
              <td><?php echo $product['name'] ?></td>
              <td><?php echo $product['created_at'] ?></td>
              <td>
                <a href="/sklep/?action=show&id=<?php echo $product['id'] ?>">
                  <button>Szczegóły</button>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </section>
</div>