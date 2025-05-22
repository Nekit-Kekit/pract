let container_1 = document.querySelector("#carousel_1"),
    photos_1 = container_1.querySelectorAll(".photo"),
    carousel_obj_1 = new carousel(photos_1),
    container_2 = document.querySelector("#carousel_2"),
    photos_2 = container_2.querySelectorAll(".photo"),
    carousel_obj_2 = new carousel(photos_2);

container_1.querySelector(".prev").addEventListener("click", function() {
    carousel_obj_1.prev_photo();
});
container_1.querySelector(".next").addEventListener("click", function() {
    carousel_obj_1.next_photo();
});
container_2.querySelector(".prev").addEventListener("click", function() {
    carousel_obj_2.prev_photo();
});
container_2.querySelector(".next").addEventListener("click", function() {
    carousel_obj_2.next_photo();
});
