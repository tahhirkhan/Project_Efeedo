
// Get all the categories sections.
let catg_under_restaurant = document.querySelectorAll(".restaurant_category");
let catg_under_bar = document.querySelectorAll(".bar_category");
let catg_under_confectionary = document.querySelectorAll(".confectionary_category");

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

    }
    else {
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
    }
    else {
        catg_under_bar[0].style.display = "none"

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

    }
    else {
        catg_under_confectionary[0].style.display = "none";

        // also hide items under this category when hiding the category. 
        items_under_chocolates[0].style.display = "none";
        items_under_candies[0].style.display = "none";
    }
}



// ======================================= FUNCTIONS TO SHOW ITEMS UNDER CATEGORIES =======================================:


// show ITEMS under CHICKEN category
function showChicken() {
    items_under_chicken[0].style.display = items_under_chicken[0].style.display == "flex" ? "none" : "flex";

    items_under_deserts[0].style.display = "none";
    items_under_beverages[0].style.display = "none";
    items_under_juices[0].style.display = "none";
    items_under_chocolates[0].style.display = "none";
    items_under_candies[0].style.display = "none";
}

// show ITEMS under DESERT category
function showDeserts() {
    items_under_deserts[0].style.display = items_under_deserts[0].style.display == "flex" ? "none" : "flex";

    items_under_chicken[0].style.display = "none";
    items_under_beverages[0].style.display = "none";
    items_under_juices[0].style.display = "none";
    items_under_chocolates[0].style.display = "none";
    items_under_candies[0].style.display = "none";
}


// show ITEMS under BEVERAGES category
function showBeverages() {
    items_under_beverages[0].style.display = items_under_beverages[0].style.display == "flex" ? "none" : "flex";

    items_under_chicken[0].style.display = "none";
    items_under_deserts[0].style.display = "none";
    items_under_juices[0].style.display = "none";
    items_under_chocolates[0].style.display = "none";
    items_under_candies[0].style.display = "none";
}

// show ITEMS under MIXERS AND JUICES category
function showMixersAndJuices() {
    items_under_juices[0].style.display = items_under_juices[0].style.display == "flex" ? "none" : "flex";

    items_under_chicken[0].style.display = "none";
    items_under_deserts[0].style.display = "none";
    items_under_beverages[0].style.display = "none";
    items_under_chocolates[0].style.display = "none";
    items_under_candies[0].style.display = "none";
}


// show ITEMS under CHOCOLATES category
function showChocolates() {
    items_under_chocolates[0].style.display = items_under_chocolates[0].style.display == "flex" ? "none" : "flex";

    items_under_chicken[0].style.display = "none";
    items_under_deserts[0].style.display = "none";
    items_under_beverages[0].style.display = "none";
    items_under_juices[0].style.display = "none";
    items_under_candies[0].style.display = "none";
}


// show ITEMS under SUGAR CANDIES category
function showSugarCandies() {
    items_under_candies[0].style.display = items_under_candies[0].style.display == "flex" ? "none" : "flex";

    items_under_chicken[0].style.display = "none";
    items_under_deserts[0].style.display = "none";
    items_under_beverages[0].style.display = "none";
    items_under_juices[0].style.display = "none";
    items_under_chocolates[0].style.display = "none";
}



// Working with Dropdown.
document.addEventListener('DOMContentLoaded', function () {
    const dropdownInput = document.getElementById('dropdownInput');
    const dropdownMenu = document.getElementById('dropdownMenu');
    const dropdownItems = dropdownMenu.querySelectorAll('.dropdown-item');

    // Show/Hide dropdown menu
    dropdownInput.addEventListener('click', function () {
        dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
    });

    // Handle item selection
    dropdownItems.forEach(function (item) {
        item.addEventListener('click', function () {
            dropdownInput.value = item.textContent;
            dropdownMenu.style.display = 'none';
        });
    });

    // Hide the menu when clicking outside
    document.addEventListener('click', function (event) {
        if (!dropdownInput.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.style.display = 'none';
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
        }
        else {
            optionsArray[i].style.display = "none";
        }
    }
}

