<div>
  <h3>Edycja notatki</h3>
  <div>
    <?php if (!empty($params['product'])) : ?>
      <?php $product = $params['product']; ?>
      <form class="note-form" action="/sklep/?action=edit" method="post">
        <input name="id" type="hidden" value="<?php echo $product['id'] ?>" />
        <ul>
          <li>
            <label>Tytuł <span class="required">*</span></label>
            <input type="text" name="name" class="field-long" value="<?php echo $product['name'] ?>" />
          </li>
          <li>
            <label>Treść</label>
            <textarea name="description" id="field5" class="field-long field-textarea"><?php echo $product['description'] ?></textarea>
          </li>
          <li>
            <input type="submit" value="Submit" />
          </li>
        </ul>
      </form>
    <?php else : ?>
      <div>
        Brak danych do wyświetlenia
        <a href="/sklep/"><button>Powrót do listy produktów</button></a>
      </div>
    <?php endif; ?>
  </div>
</div>