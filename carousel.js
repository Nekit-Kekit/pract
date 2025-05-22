class carousel {
    constructor(photos){
        this.show_index = 0;
        this.photos = photos;
    }

    next_photo(){
        this.photos.forEach(photo => {
            photo.classList.remove("show")
        });
        this.show_index++;
        if (this.show_index >= this.photos.length) {
            this.show_index = 0;
        }    
        this.photos[this.show_index].classList.add("show");
    }
    prev_photo(){
        this.photos.forEach(photo => {
            photo.classList.remove("show")
        });
        this.show_index--;
        if (this.show_index < 0) {
            this.show_index = this.photos.length - 1;
        }    
        this.photos[this.show_index].classList.add("show");
    }
}