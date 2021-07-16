let dvdDetails = document.querySelector("#dvd"),
    furnitureDetails = document.querySelector("#furniture"),
    bookDetails = document.querySelector("#book"),
    skuInput = document.querySelector('#sku'),
    saveButton = document.querySelector("#save"),
    productSize = document.querySelector("#size"),
    productWeight = document.querySelector("#weight"),
    productHeight = document.querySelector("#height"),
    productWidth = document.querySelector("#width"),
    productLength = document.querySelector("#length"),
    description = document.querySelectorAll(".description"),
    addProductForm = document.querySelector("#product_form"),
    productTypeSelect = document.querySelector("select");

let selectedType;

initDetails();

skuInput.value = create_unique_sku();

productTypeSelect.addEventListener("change", (event) => {
    selectedType = event.target.value;
    selectedType === "dvd" ? showDvdDetails() : 
    selectedType === "furniture" ? showFurnitureDetails() : 
    selectedType === "book" ? showBooksDetails() : initDetails();
});

addProductForm.addEventListener("submit", function(event) {
    
    if (selectedType === "dvd") {
        valid = validateDisc();
    }
    else if (selectedType === "furniture") {
        valid = validateFurniture();
    }
    else if (selectedType == "book") {
        valid = validateBook();
    }
    
    if (valid) {
        event.target.submit();
    }
    else {
        event.preventDefault();
        return;
    }
});

function initDetails() {
    dvdDetails.style.display = 'none';
    furnitureDetails.style.display = 'none';
    bookDetails.style.display = 'none';
}

function showDvdDetails() {
    dvdDetails.style.display = 'block';
    furnitureDetails.style.display = 'none';
    bookDetails.style.display = 'none';
}

function showFurnitureDetails() {
    dvdDetails.style.display = 'none';
    furnitureDetails.style.display = 'block';
    bookDetails.style.display = 'none';
}

function showBooksDetails() {
    dvdDetails.style.display = 'none';
    furnitureDetails.style.display = 'none';
    bookDetails.style.display = 'block';
}

function create_unique_sku(){
    let dt = new Date().getTime();
    let uuid = 'xxxxxxxx'.replace(/[xy]/g, function(c) {
        let r = (dt + Math.random()*16)%16 | 0;
        dt = Math.floor(dt/16);
        return (c=='x' ? r :(r&0x3|0x8)).toString(16);
    });
    return uuid;
}

function validateDisc() {
    if (productSize.value == "") {
        description[0].style.display = "block";
        return false;
    }
    return true;
}

// else if (selectedType == "book") {
//     if (productWeight.value == null) {
    
//     }
// }
// else if (selectedType == "furniture") {
//     if (productHeight.value == null || productLength.value == null || productWeight.value == null) {
        
//     }
// }
