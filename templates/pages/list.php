<div class="list">
  <section>
    <div class="message">
      <?php
      if (!empty($params['error'])) {
        switch ($params['error']) {
          case 'missingNoteId':
            echo 'Niepoprawny identyfikator notatki';
            break;
          case 'productNotFound':
            echo 'Produkt nie został znaleziony';
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
        }
      }
      ?>
    </div>

    <div class="tbl-header">
      <table cellpadding="0" cellspacing="0" border="0">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nazwa</th>
            <th>Data utworzenia</th>
            <th>Cena</th>
          </tr>
        </thead>
      </table>
    </div>
    <div class="tbl-content">
      <table cellpadding="0" cellspacing="0" border="0">
        <tbody>
          <?php foreach ($params['products'] ?? [] as $product) : ?>
            <tr>
              <td><?php echo (int) $product['id'] ?></td>
              <td><?php echo htmlentities($product['name']) ?></td>
              <td><?php echo htmlentities($product['created_at']) ?></td>
              <td>
                <a href="/?action=show&id=<?php echo (int) $product['id'] ?>">
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