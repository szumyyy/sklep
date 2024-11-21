<div>
  <h3> nowy produkt </h3>
  <div>
    <form class="product-form" action="/sklep/?action=create" method="post">
      <ul>
        <li>
          <label>Tytuł<span class="required">*</span></label>
          <input type="text" name="name" class="name" />
        </li>
        <li>
          <label>Treść</label>
          <textarea name="description" id="field5" class="description"></textarea>
        </li>
        <li>
          <label>Cena<span class="required">*</span></label>
          <input type="number" name="price" class="price" />
        </li>
        <li>
          <label>Ilość<span class="required">*</span></label>
          <input type="number" name="stock" class="stock" />
        </li>
        <li>
          <label>Zdjęcie<span class="required">*</span></label>
          <input type="text" name="image" class="image" />
        </li>
        <li>
          <input type="submit" value="Submit" />
        </li>
        
      </ul>
    </form>
  </div>
</div>