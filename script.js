// Get all the categories sections.
let catg_under_restaurant = document.querySelectorAll(".restaurant_category");
let catg_under_bar = document.querySelectorAll(".bar_category");
let catg_under_confectionary = document.querySelectorAll(
  ".confectionary_category"
);

// Get all the items sections (using class name).
let items_under_chicken = document.querySelectorAll(".chicken_items");
let items_under_deserts = document.querySelectorAll(".desert_items");
let items_under_beverages = document.querySelectorAll(".beverage_items");
let items_under_juices = document.querySelectorAll(".juice_items");
let items_under_chocolates = document.querySelectorAll(".chocolate_items");
let items_under_candies = document.querySelectorAll(".candy_items");

// ======================================= FUNCTIONS TO SHOW CATEGORIES UNDER AREAS =======================================:

// show CATEGORIES under RESTAURANT area:
function showCatergoriesUnderRestaurant() {
  if (catg_under_restaurant[0].style.display == "none") {
    catg_under_restaurant[0].style.display = "block";

    // hide categoreis under other areas except this one.
    catg_under_bar[0].style.display = "none";
    catg_under_confectionary[0].style.display = "none";

    // also hide items under the above hidden categories.
    items_under_beverages[0].style.display = "none";
    items_under_juices[0].style.display = "none";
    items_under_chocolates[0].style.display = "none";
    items_under_candies[0].style.display = "none";
  } else {
    catg_under_restaurant[0].style.display = "none";

    // also hide items under this category when hiding the category.
    items_under_chicken[0].style.display = "none";
    items_under_deserts[0].style.display = "none";
  }
}

// show CATEGORIES under BAR area:
function showCatergoriesUnderBar() {
  if (catg_under_bar[0].style.display == "none") {
    catg_under_bar[0].style.display = "block";

    // hide categoreis under other areas except this one.
    catg_under_restaurant[0].style.display = "none";
    catg_under_confectionary[0].style.display = "none";

    // also hide items under the above hidden categories.
    items_under_chicken[0].style.display = "none";
    items_under_deserts[0].style.display = "none";
    items_under_chocolates[0].style.display = "none";
    items_under_candies[0].style.display = "none";
  } else {
    catg_under_bar[0].style.display = "none";

    // also hide items under this category when hiding the category.
    items_under_beverages[0].style.display = "none";
    items_under_juices[0].style.display = "none";
  }
}

// show CATEGORIES under CONFECTIONARY area
function showCatergoriesUnderConfectionary() {
  if (catg_under_confectionary[0].style.display == "none") {
    catg_under_confectionary[0].style.display = "block";

    // hide categoreis under other areas except this one.
    catg_under_restaurant[0].style.display = "none";
    catg_under_bar[0].style.display = "none";

    // also hide items under the above hidden categories.
    items_under_chicken[0].style.display = "none";
    items_under_deserts[0].style.display = "none";
    items_under_beverages[0].style.display = "none";
    items_under_juices[0].style.display = "none";
  } else {
    catg_under_confectionary[0].style.display = "none";

    // also hide items under this category when hiding the category.
    items_under_chocolates[0].style.display = "none";
    items_under_candies[0].style.display = "none";
  }
}

// ======================================= FUNCTIONS TO SHOW ITEMS UNDER CATEGORIES =======================================:

// show ITEMS under CHICKEN category
function showChicken() {
  items_under_chicken[0].style.display =
    items_under_chicken[0].style.display == "flex" ? "none" : "flex";

  items_under_deserts[0].style.display = "none";
  items_under_beverages[0].style.display = "none";
  items_under_juices[0].style.display = "none";
  items_under_chocolates[0].style.display = "none";
  items_under_candies[0].style.display = "none";
}

// show ITEMS under DESERT category
function showDeserts() {
  items_under_deserts[0].style.display =
    items_under_deserts[0].style.display == "flex" ? "none" : "flex";

  items_under_chicken[0].style.display = "none";
  items_under_beverages[0].style.display = "none";
  items_under_juices[0].style.display = "none";
  items_under_chocolates[0].style.display = "none";
  items_under_candies[0].style.display = "none";
}

// show ITEMS under BEVERAGES category
function showBeverages() {
  items_under_beverages[0].style.display =
    items_under_beverages[0].style.display == "flex" ? "none" : "flex";

  items_under_chicken[0].style.display = "none";
  items_under_deserts[0].style.display = "none";
  items_under_juices[0].style.display = "none";
  items_under_chocolates[0].style.display = "none";
  items_under_candies[0].style.display = "none";
}

// show ITEMS under MIXERS AND JUICES category
function showMixersAndJuices() {
  items_under_juices[0].style.display =
    items_under_juices[0].style.display == "flex" ? "none" : "flex";

  items_under_chicken[0].style.display = "none";
  items_under_deserts[0].style.display = "none";
  items_under_beverages[0].style.display = "none";
  items_under_chocolates[0].style.display = "none";
  items_under_candies[0].style.display = "none";
}

// show ITEMS under CHOCOLATES category
function showChocolates() {
  items_under_chocolates[0].style.display =
    items_under_chocolates[0].style.display == "flex" ? "none" : "flex";

  items_under_chicken[0].style.display = "none";
  items_under_deserts[0].style.display = "none";
  items_under_beverages[0].style.display = "none";
  items_under_juices[0].style.display = "none";
  items_under_candies[0].style.display = "none";
}

// show ITEMS under SUGAR CANDIES category
function showSugarCandies() {
  items_under_candies[0].style.display =
    items_under_candies[0].style.display == "flex" ? "none" : "flex";

  items_under_chicken[0].style.display = "none";
  items_under_deserts[0].style.display = "none";
  items_under_beverages[0].style.display = "none";
  items_under_juices[0].style.display = "none";
  items_under_chocolates[0].style.display = "none";
}

// Working with Dropdown.
document.addEventListener("DOMContentLoaded", function () {
  const dropdownInput = document.getElementById("dropdownInput");
  const dropdownMenu = document.getElementById("dropdownMenu");
  const dropdownItems = dropdownMenu.querySelectorAll(".dropdown-item");

  // Show/Hide dropdown menu
  dropdownInput.addEventListener("click", function () {
    dropdownMenu.style.display =
      dropdownMenu.style.display === "block" ? "none" : "block";
  });

  // Handle item selection
  dropdownItems.forEach(function (item) {
    item.addEventListener("click", function () {
      dropdownInput.value = item.textContent;
      dropdownMenu.style.display = "none";
    });
  });

  // Hide the menu when clicking outside
  document.addEventListener("click", function (event) {
    if (
      !dropdownInput.contains(event.target) &&
      !dropdownMenu.contains(event.target)
    ) {
      dropdownMenu.style.display = "none";
    }
  });
});

// implement search in dropdown:
function filterDropdownItems() {
  var input, filter, div, optionsArray, option, i;
  input = document.getElementById("dropdownInput").value.toUpperCase();

  div = document.getElementById("dropdownMenu");
  optionsArray = div.getElementsByClassName("dropdown-item");

  for (i = 0; i < optionsArray.length; i++) {
    option = optionsArray[i].value;

    if (option.toUpperCase().indexOf(input) > -1) {
      optionsArray[i].style.display = "";
    } else {
      optionsArray[i].style.display = "none";
    }
  }
}

//js for right section

// items of a single order

const order = {
  // item consist of itemName, qty, rate, and amount
  items: {},
  specialInstructions: "",
  totalTaxes: 0,
  totalTaxesPercent: "CGST @2.5% and SGST @2.5%",
  type: "",
  server: "",
  totalQuantity: 0,
  grossAmount: 0,
  discountedPercent: 0,
  discountedAmount: 0,
};

// when item is directly clicked at search bar
document
  .querySelectorAll(".search-menu-div .search-menu-item")
  .forEach((item) => {
    item.addEventListener("click", function () {
      const itemName = item.value;

      const rate = parseFloat(item.getAttribute("data-price"));

      const categoryId = item.getAttribute("category-id");

      const qty = 1; //default

      let totalItemAmount = parseFloat(rate);

      const itemInst = "";

      addItem(categoryId, itemName, qty, rate, totalItemAmount, itemInst);
    });
  });

// when item is clicked at below
document.querySelectorAll(".add-item-div").forEach((divItem) => {
  divItem.addEventListener("click", function () {
    const itemName = divItem
      .querySelector(".card-text")
      .innerText.replace(/\(.*?\)/, "");

    const rate = divItem.querySelector(".card-text").getAttribute("data-price");

    const categoryId = divItem
      .querySelector(".card-text")
      .getAttribute("category-id");

    const qty = 1; // default

    const totalItemAmount = parseFloat(rate);

    const itemInst = "";

    addItem(categoryId, itemName, qty, rate, totalItemAmount, itemInst);
  });
});

// Function to add item to table
let totalQty = 0;
let totalAmount = 0;
let cgstAmount = 0;
let sgstAmount = 0;
let discountedSubTotal = totalAmount;

function incr_qty_and_amt(cat_id, rate) {
  tr = document.getElementById(cat_id);
  qty = tr.children[1].children[1];
  qty.innerText = parseInt(qty.innerText) + 1;
  quantity = qty.innerText;
  console.log(tr);
  item_amt = tr.children[3];
  item_amt.innerText = parseFloat(item_amt.innerText) + parseFloat(rate);

  //for order
  order.totalQuantity += 1;
  order.items[cat_id].qty += 1;
  order.items[cat_id].totalItemAmount += parseFloat(rate);

  totalQty += 1;
  totalAmount += parseFloat(rate);

  //update bill items
  updateAmount(tr, quantity);
}

function addItem(categoryId, itemName, qty, rate, totalItemAmount, itemInst) {
  const table = document.querySelector("#addItemToTable");

  if (categoryId in order.items) {
    incr_qty_and_amt(categoryId, rate);
  } else {
    // Create table row
    const tableRow = document.createElement("tr");

    //set id to table row
    tableRow.setAttribute("id", categoryId);

    // Item name cell
    const tableDataName = document.createElement("td");
    tableDataName.innerHTML = `<a onclick="removeItem(this,${categoryId})" type='button'><i class="fa-solid fa-trash"></i></a> <span>${itemName}</span>`;
    tableRow.appendChild(tableDataName);

    // Quantity cell
    const tableDataQty = document.createElement("td");
    tableDataQty.innerHTML = `<a type='button' onclick="decreaseQuantity(this,${categoryId},${rate})"><i class="fa-solid fa-circle-minus"></i></a> <span "name"='qty'>${qty}</span> <a type='button' onclick="increaseQuantity(this,${categoryId},${rate})"><i class="fa-solid fa-circle-plus"></i></a>`;
    tableRow.appendChild(tableDataQty);

    // Rate cell
    const tableDataRate = document.createElement("td");
    tableDataRate.setAttribute("rate", categoryId);
    tableDataRate.innerText = rate;
    tableRow.appendChild(tableDataRate);

    // Amount cell
    const tableDataAmount = document.createElement("td");
    tableDataAmount.setAttribute("amt", categoryId);
    tableDataAmount.innerText = parseInt(qty) * parseInt(rate);
    tableRow.appendChild(tableDataAmount);

    // Append row to table body
    table.appendChild(tableRow);

    //update totalAmount
    totalQty += qty;
    totalAmount += qty * rate;
    updateBillingTable();

    //adding items to json array
    order.items[categoryId] = {
      itemName,
      qty,
      rate,
      totalItemAmount,
      itemInst,
    };
    order.totalQuantity += 1;

    // type for order
    order.type = "taxed";

    tableDataName.addEventListener("click", function () {
      showItemModal(categoryId);
    });
  }
}

// Function to remove item
function removeItem(btn, categoryId) {
  const row = btn.closest("tr");
  const qty = parseInt(row.cells[1].querySelector("span").innerText);
  const amount = parseFloat(row.cells[3].innerText);

  totalQty -= qty;
  totalAmount -= amount;

  // delete/remove item from order.items
  delete order.items[categoryId];
  order.totalQuantity -= qty;

  row.remove();
  updateBillingTable();
}

// Function to decrease quantity
function decreaseQuantity(btn, categoryId, rate) {
  const qtySpan = btn.nextElementSibling; // Access the quantity span
  let qty = parseInt(qtySpan.innerText);

  if (qty > 1) {
    qty--;
    totalQty--;

    // tr = btn.closest('tr')
    // //for order
    // order.tr.cells[0].innerText[qty] += 1

    // tr = btn.closest('tr')
    // item = tr.cells[0].innerText[qty]

    //for order quantity
    order.totalQuantity -= 1;
    order.items[categoryId].qty -= 1;
    order.items[categoryId].totalItemAmount -= parseFloat(rate);

    qtySpan.innerText = qty;
    const row = btn.closest("tr");

    updateAmount(row, qty); // Pass row and qty to updateAmount
  }
}

// Function to increase quantity
function increaseQuantity(btn, categoryId, rate) {
  const qtySpan = btn.previousElementSibling; // Access the quantity span
  let qty = parseInt(qtySpan.innerText);
  qty++;
  totalQty++;

  // tr = btn.closest('tr')
  // item = tr.cells[0].innerText[qty]

  //for order
  order.totalQuantity += 1;
  order.items[categoryId].qty += 1;
  order.items[categoryId].totalItemAmount += parseFloat(rate);

  qtySpan.innerText = qty;
  const row = btn.closest("tr");
  updateAmount(row, qty); // Pass row and qty to updateAmount
}

// Function to update amount
function updateAmount(row, qty) {
  const rate = parseFloat(row.cells[2].innerText); // Get rate from the third cell
  const amount = row.cells[3];
  const prevAmount = parseFloat(amount.innerText);
  const newAmount = parseFloat((qty * rate).toFixed(2));

  totalAmount = totalAmount - prevAmount + newAmount;
  amount.innerText = newAmount;

  updateBillingTable();
}

function updateBillingTable() {
  document.getElementById("totalQty").innerText = totalQty;

  // update order array with totalQty
  //   order.items[totalQty] += parseInt(totalQty);

  document
    .querySelectorAll(".totalAmount")
    .forEach((elementWithClassTotalAmount) => {
      elementWithClassTotalAmount.innerText = totalAmount.toFixed(2);
    });

  discountedSubTotal =
    totalAmount -
    (document.querySelector("#inputGroupP input").value / 100) * totalAmount;

  updateTotalAmount(document.getElementById("taxed").checked);
}

function updateDiscountedPecent() {
  const percent = document.querySelector("#inputGroupP input");
  const rupees = document.querySelector("#inputGroupR input");

  const discountedPercent = (rupees.value * 100) / parseFloat(totalAmount);

  percent.value = discountedPercent.toFixed(2);

  const discountedAmount = (percent.value / 100) * parseFloat(totalAmount);

  order.discountedPercent = discountedPercent.toFixed(2);
  order.discountedAmount = parseFloat(discountedAmount.toFixed(2));

  discountedSubTotal = totalAmount - discountedAmount;

  updateTotalAmount(document.getElementById("taxed").checked);
}

function updateDiscountedAmount() {
  const percent = document.querySelector("#inputGroupP input");
  const rupees = document.querySelector("#inputGroupR input");

  if (isNaN(percent.value) || percent.value < 0 || percent.value > 100) {
    alert("Please enter a valid percentage between 0 and 100.");
    document.querySelector("#inputGroupP input").value = "";
    return;
  }

  const discountedAmount = (percent.value / 100) * parseFloat(totalAmount);

  rupees.value = discountedAmount.toFixed(2);

  const discountedPercent = (rupees.value * 100) / parseFloat(totalAmount);

  order.discountedAmount = parseFloat(discountedAmount.toFixed(2));

  order.discountedPercent = discountedPercent.toFixed(2);

  discountedSubTotal = totalAmount - discountedAmount;

  updateTotalAmount(document.getElementById("taxed").checked);
}

function updateTotalAmount(isTaxed) {
  let cgstAmount = 0;
  let sgstAmount = 0;

  if (isTaxed) {
    cgstAmount = (discountedSubTotal * 0.025).toFixed(2);
    sgstAmount = (discountedSubTotal * 0.025).toFixed(2);

    //total taxes in an order
    order.totalTaxes = parseFloat(cgstAmount) + parseFloat(sgstAmount);

    //update type of order
    order.type = "";
    order.type = "taxed";
  }

  document.getElementById("cgstAmount").innerText = cgstAmount;
  document.getElementById("sgstAmount").innerText = sgstAmount;

  const grossTotal = (
    parseFloat(discountedSubTotal) +
    parseFloat(cgstAmount) +
    parseFloat(sgstAmount)
  ).toFixed(2);

  document.getElementById("grossTotal").innerText = grossTotal;

  // gross total on order
  order.grossAmount = parseFloat(grossTotal);
}

document
  .querySelector("#inputGroupP input")
  .addEventListener("input", updateDiscountedAmount);

document
  .querySelector("#inputGroupR input")
  .addEventListener("input", updateDiscountedPecent);

// Taxed part
const radio = document.querySelectorAll('input[type="radio"]');

radio.forEach((btn) => {
  btn.addEventListener("change", (event) => {
    const gstElements = document.querySelectorAll(".gst");

    if (event.target.id === "taxed" && event.target.checked) {
      gstElements.forEach((gstElement) =>
        gstElement.classList.remove("hidden")
      );
      updateTotalAmount(true);

      //total order type
      order.type = "";
      order.type = "taxed";
    } else if (event.target.id === "nonTaxed" && event.target.checked) {
      gstElements.forEach((gstElement) => gstElement.classList.add("hidden"));
      updateTotalAmount(false);

      //total order type
      order.type = "";
      order.type = "billed";
      order.totalTaxes = 0;
    }
  });
});

//special Instructions

document
  .querySelector(".specialInstructions textarea")
  .addEventListener("input", function () {
    let textArea = document.querySelector(".specialInstructions textarea");
    order.specialInstructions = textArea.value;
  });

//server name

document
  .querySelector(".serverDiv .server")
  .addEventListener("input", function () {
    let serverName = document.querySelector(".serverDiv .server");
    order.server = serverName.value;
  });

// modal
function showItemModal(cat_Id) {
  const inst = document.querySelector(".itemInst textarea");
  const newInst = inst.cloneNode(true);
  inst.parentNode.replaceChild(newInst, inst);

  newInst.value = order.items[cat_Id].itemInst || "";

  // Attach new event listener
  newInst.addEventListener("input", function () {
    const val = newInst.value;
    order.items[cat_Id].itemInst = val;
  });

  // Show the modal
  $("#modalItem").modal("show");
}

// document
//   .querySelector(".text-div text-area")
//   .addEventListener("input", function () {
//     instructions = document.querySelector(".text-div text-area").value;
//   });
// console.log(size);
// console.log(instructions);

//pay function
function payment() {
  if (Object.keys(order.items).length == 0) {
    alert("Add to cart is empty");
  } else {
    $("#payModal").modal("show");
    const payNow = document.getElementById("pay-now");
    const payLater = document.getElementById("pay-later");

    payNow.addEventListener("click", function () {
      document.querySelector(".modal-body").style.display = "block";
    });

    payLater.addEventListener("click", function () {
      document.querySelector(".modal-body").style.display = "none";
      payNow.classList.remove("active");
    });

    //payment method
    const paymentDropdownOpt = document.querySelector(".payment-dropdown");

    document.querySelectorAll(".payment-method").forEach((paymentOption) => {
      paymentOption.addEventListener("click", function () {
        paymentDropdownOpt.innerText = paymentOption.innerText;
      });
    });

    // when click on submit btn get order array
    document.querySelector("#pay-form").addEventListener("submit", function () {
      const orderInputData = document.querySelector("#order-data");
      orderInputData.value = JSON.stringify(order);
    });
  }
}
