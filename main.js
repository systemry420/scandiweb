$(document).ready(function(){
    let dvdDetails = $("#dvd"),
        furnitureDetails = $("#furniture"),
        bookDetails = $("#book");

    dvdDetails.hide();
    furnitureDetails.hide();
    bookDetails.hide();

    $("select").on("change", function () {
        let selectedType = this.value;
        if (selectedType === "DVD") {
            dvdDetails.show();
            furnitureDetails.hide();
            bookDetails.hide();
        }
        else if (selectedType === "Furniture") {
            furnitureDetails.show();
            dvdDetails.hide();
            bookDetails.hide();
        }
        else if (selectedType === "Book") {
            bookDetails.show();
            dvdDetails.hide();
            furnitureDetails.hide();
        }
        else {
            return;
        }
    })
  
});