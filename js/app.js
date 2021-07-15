let dvdDetails = document.querySelector("#dvd"),
    furnitureDetails = document.querySelector("#furniture"),
    bookDetails = document.querySelector("#book"),
    skuInput = document.querySelector('#sku'),
    productTypeSelect = document.querySelector("select");

initDetails();

skuInput.value = create_unique_sku();

productTypeSelect.addEventListener("change", (event) => {
    let selectedType = event.target.value;
    selectedType === "dvd" ? showDvdDetails() : 
    selectedType === "furniture" ? showFurnitureDetails() : 
    selectedType === "book" ? showBooksDetails() : initDetails();
});

function create_unique_sku(){
    let dt = new Date().getTime();
    let uuid = 'xxxxxxxx'.replace(/[xy]/g, function(c) {
        let r = (dt + Math.random()*16)%16 | 0;
        dt = Math.floor(dt/16);
        return (c=='x' ? r :(r&0x3|0x8)).toString(16);
    });
    return uuid;
}

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

