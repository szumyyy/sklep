<div>
  <h3> nowy produkt </h3>
  <div>
    <form class="product-form" action="/sklep/?action=create" method="post">
      <ul>
        <li>
          <label>Tytuł <span class="required">*</span></label>
          <input type="text" name="name" class="field-long" />
        </li>
        <li>
          <label>Treść</label>
          <textarea name="description" id="field5" class="field-long field-textarea"></textarea>
        </li>
        <li>
          <input type="submit" value="Submit" />
        </li>
      </ul>
    </form>
  </div>
</div>