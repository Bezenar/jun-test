<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Scandiweb test</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
      crossorigin="anonymous"
    >
    <link rel="stylesheet" href="./public/css/main.css">
  </head>
  <body>
    <header id="header" class="header container el--height-10">
      <div class="d-flex justify-content-between align-items-center">
        <?php
          // Checking GET data for change buttons and title in page.
          if($_GET["page"] === "addForm") {
            ?>
              <h1 class="header__title" @click="productList" data-btn="title">PRODUCT ADD</h1>
              <div class="">
                <div class="buttons-container">
                  <button type="button" class="btn btn-outline-dark" data-btn="save">
                    SAVE
                  </button>
                  <button type="button" class="btn btn-outline-dark" data-btn="cancel">CANCEL</button>
                </div>
              </div>
            <?php
          } else {
            ?>
              <h1 class="header__title" @click="productList" data-btn="title">PRODUCT LIST</h1>
              <div class="">
                <div class="buttons-container">
                  <button type="button" class="btn btn-outline-dark" data-btn="add" >
                    ADD
                  </button>
                  <button type="button" class="btn btn-outline-dark" data-btn="mass-delete">MASS DELETE</button>
                </div>
              </div>
            <?php
          }
        ?>
      </div>
    </header>
    <hr class="header__underline m-1">
    <main class="el--min-heihgt-80">
  