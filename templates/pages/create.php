<div>
  <h3>Dodawanie produktu</h3>
  <div>
    <form class="product-form" action="/sklep/?action=create" method="post" enctype="multipart/form-data">
      <ul>
        <li>
          <label>Tytuł <span class="required">*</span></label>
          <input type="text" name="name" class="field-long" />
        </li>
        <li>
          <label>Treść</label>
          <textarea name="description" id="field5" class="field-long field-textarea"></textarea>
        </li>
        <label>Cena<span class="required">*</span></label>
          <input type="number" name="price" class="field-long" />
        </li>
        <li>
          <label>Ilość<span class="required">*</span></label>
          <input type="number" name="stock" class="field-long" />
        </li>
        <li>
          <label>Zdjęcie<span class="required">*</span></label>
          <input type="file" name="image" class="field-long" />
        </li>
        <li>
          <input type="submit" value="Submit"/>
        </li>
      </ul>
    </form>
  </div>
</div>