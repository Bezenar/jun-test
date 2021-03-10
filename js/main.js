/**
 * HTML elements declaration to constants
 */
const addBtn = $("[data-btn=add]"); // Button to add product.
const massDelBtn = $("[data-btn=mass-delete]"); // Button to mass delete product.
const saveBtn = $("[data-btn=save]"); // Button to save product.
const cancelBtn = $("[data-btn=cancel]"); // Button to cancel product adding.
const title = $("[data-btn=title]"); // Page title. Work like button.
const typeSwitcher = $("[data-select=type-switcher]"); // Add product type switcher.

/**
 * Events.
 */
// Events listeners to change view between form and product list.
addBtn.click(() => {
  document.location.search = "?page=addForm";
});
title.click(backToHomePage);
cancelBtn.click(backToHomePage);

// Event listener to show/hide form block.
typeSwitcher.change(checkTypeSwitcher);
// Event listener for form submiting;
saveBtn.click(onSubmit);
// Event listener to delete product/products.
massDelBtn.click(onDeleteBtn);

// Handler for change view.
function backToHomePage() {
  document.location.search = "";
}

// Handler for type switcher.
function checkTypeSwitcher() {
  $(".description").text("");
  if ($("#height").hasClass("border-danger")) $("#height").removeClass("border-danger");
  if ($("#width").hasClass("border-danger")) $("#width").removeClass("border-danger");
  if ($("#length").hasClass("border-danger")) $("#length").removeClass("border-danger");
  if ($("#size").hasClass("border-danger")) $("#size").removeClass("border-danger");
  if ($("#weight").hasClass("border-danger")) $("#weight").removeClass("border-danger");
  const val = typeSwitcher.val();
  const formBlocks = Array.from($("[data-form]"));

  formBlocks.forEach(el => {
    if ($(el).hasClass("hide") === false) {
      $(el).addClass("hide");
    }
  });

  switch (val) {
    case "Book":
      $("[data-form=weight]").removeClass("hide");
      $(".description").text("Please, provide weight");
      break;
    case "Furniture":
      $("[data-form=dimension]").removeClass("hide");
      $(".description").text("Please, provide dimensions");
      break;
    case "DVD":
      $("[data-form=size]").removeClass("hide");
      $(".description").text("Please, provide size");
      break;
    case "Type Switcher":
    default:
      break;
  }
}

// Handler for form submit.
function onSubmit(e) {
  e.preventDefault();
  const result = formValidation();
  if (result) return $("form").submit();
}
// Form validation
function formValidation() {
  if ($("#sku").val().length <= 0) $("#sku").addClass("border-danger");
  if ($("#name").val().length <= 0) $("#name").addClass("border-danger");
  if ($("#price").val().length <= 0) $("#price").addClass("border-danger");
  if ($(typeSwitcher).val() === "Type Switcher") $(typeSwitcher).addClass("border-danger");
  if ($("[data-form=size]").is(":visible") && $("#size").val().length <= 0) $("#size").addClass("border-danger");
  if ($("[data-form=weight]").is(":visible") && $("#weight").val().length <= 0) $("#weight").addClass("border-danger");
  if ($("[data-form=dimension]").is(":visible")) {
    if ($("#height").val().length <= 0) $("#height").addClass("border-danger");
    if ($("#width").val().length <= 0) $("#width").addClass("border-danger");
    if ($("#length").val().length <= 0) $("#length").addClass("border-danger");
  }
  let result = true;
  Array.from($("input")).forEach(el => {
    if ($(el).hasClass("border-danger")) {
      result = false;
    }
  });
  return result;
}
// Handler for delete products.
function onDeleteBtn() {
  const boxes = $(".form-check-input:checked");
  const values = Array.from(boxes).reduce((acc, box) => {
    acc.push($(box).val());
    return acc;
  }, []);

  $.ajax({
    url: "./actions/deleteProduct.php",
    type: "post",
    data: { data: values },
    success: function (data, textStatus, jQxhr) {
      location.reload();
    }
  });
}
$("#test").click(formValidation);

Array.from($("input")).forEach(el => {
  $(el).focus(() => {
    $(el).removeClass("border-danger");
  });
});
$(typeSwitcher).change(() => {
  $(typeSwitcher).removeClass("border-danger");
});
