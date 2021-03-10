<div class="container">
  <form name="add-product" action="." method="POST" class="col-4">

    <div class="row mb-3">
      <label for="SKU" class="col-sm-4 col-form-label">SKU</label>
      <div class="col-sm-8">
        <input type="text" class="form-control border border-3" id="sku" name="sku">
      </div>
    </div>

    <div class="row mb-3">
      <label for="name" class="col-sm-4 col-form-label">Name</label>
      <div class="col-sm-8">
        <input type="text" class="form-control border border-3" id="name" name="name">
      </div>
    </div>

    <div class="row mb-3">
      <label for="price" class="col-sm-4 col-form-label">Price ($)</label>
      <div class="col-sm-8">
        <input type="number" class="form-control border border-3 el--hide-arrows" id="price" name="price">
      </div>
    </div>

    <div class="row mb-3">
      <label for="type" class="col-sm-4 col-form-label">Type Switcher</label>
      <div class="col-sm-8">
        <select class="form-select border border-3" aria-label="Default select example" data-select="type-switcher">
          <option value="Type Switcher">Type Switcher</option>
          <option value="DVD">DVD</option>
          <option value="Furniture">Furniture</option>
          <option value="Book">Book</option>
        </select>
      </div>
    </div>

    <div class="row mb-3 hide" data-form="size">
      <label for="size" class="col-sm-4 col-form-label">Size (MB)</label>
      <div class="col-sm-8">
        <input type="number" class="form-control border border-3 el--hide-arrows" id="size" name="size">
      </div>
    </div>

    <div class="row mb-3 hide" data-form="weight">
      <label for="weight" class="col-sm-4 col-form-label">Weight (KG)</label>
      <div class="col-sm-8">
        <input type="number" class="form-control border border-3 el--hide-arrows" id="weight" name="weight">
      </div>
    </div>

    <div class="hide" data-form="dimension">
      <div class="row mb-3">
        <label for="height" class="col-sm-4 col-form-label">Height (CM)</label>
        <div class="col-sm-8">
          <input type="number" class="form-control border border-3 el--hide-arrows" id="height" name="height">
        </div>
      </div>
      <div class="row mb-3">
        <label for="width" class="col-sm-4 col-form-label">Width (CM)</label>
        <div class="col-sm-8">
          <input type="number" class="form-control border border-3 el--hide-arrows" id="width" name="width">
        </div>
      </div>
      <div class="row mb-3">
        <label for="length" class="col-sm-4 col-form-label">Length (CM)</label>
        <div class="col-sm-8">
          <input type="number" class="form-control border border-3 el--hide-arrows" id="length" name="length">
        </div>
      </div>
    </div>
    <div class="row mb-3">
        <p class="description"></p>
      </div>
  </form>
  <?php
  ?>
</div>