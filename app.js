let dvdDetails = document.querySelector("#dvd"),
    furnitureDetails = document.querySelector("#furniture"),
    bookDetails = document.querySelector("#book"),
    skuInput = document.querySelector('#sku'),
    select = document.querySelector("select");

    dvdDetails.style.display = 'none';
    furnitureDetails.style.display = 'none';
    bookDetails.style.display = 'none';

    skuInput.value = create_unique_sku();

    select.addEventListener("change", (event) => {
        let selectedType = event.target.value;
        if (selectedType === "DVD") {
            dvdDetails.style.display = 'block';
            furnitureDetails.style.display = 'none';
            bookDetails.style.display = 'none';
        }
        else if (selectedType === "Furniture") {
            dvdDetails.style.display = 'none';
            furnitureDetails.style.display = 'block';
            bookDetails.style.display = 'none';
        }
        else if (selectedType === "Book") {
            dvdDetails.style.display = 'none';
            furnitureDetails.style.display = 'none';
            bookDetails.style.display = 'block';
        }
    });

function create_unique_sku(){
    let dt = new Date().getTime();
    let uuid = 'xxxxxxxxxx'.replace(/[xy]/g, function(c) {
        let r = (dt + Math.random()*16)%16 | 0;
        dt = Math.floor(dt/16);
        return (c=='x' ? r :(r&0x3|0x8)).toString(16);
    });

    console.log(uuid);
    return uuid;
}

