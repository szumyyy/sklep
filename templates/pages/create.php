<div>
  <h3> nowa notatka </h3>
  <div>
    <?php if ($params['created']) : ?>
      <div>
        <div>Tytuł: <?php echo $params['title'] ?></div>
        <div>Treść: <?php echo $params['description'] ?></div>
      </div>
    <?php else : ?>
      <form class="product-form" action="/sklep/?action=create" method="post">
        <ul>
          <li>
            <label>Tytuł <span class="required">*</span></label>
            <input type="text" name="title" class="field-long" />
          </li>
          <li>
            <label>Opis</label>
            <textarea name="description" id="www" class="abc"></textarea>
          </li>
          <li>
            <label>Cena </label>
          </li>
          <li>
            <input type="submit" value="Submit" />
          </li>
        </ul>
      </form>
    <?php endif; ?>
  </div>
</div>