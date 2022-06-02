
// VanillaTilt.init(document.querySelectorAll(".card-item"), {
//     max: 30,
//     speed: 600,
//     scale: 1,
//     transition: true,
//     easing: "cubic-bezier(.03,.98,.52,.99)",
//     perspective: 600,
//     glare: true,
//     "max-glare": 0.5
// });


const imgFile = document.getElementById("file-1");
const previewContainer = document.getElementById("imgPreview");
const previewImage = document.querySelector(".img-preview__image");
const previewText = document.querySelector(".img-preview__text");

imgFile.addEventListener("change", function () {
    const file = this.files[0];

    if (file) {
        const reader = new FileReader();

        previewText.style.display = "none";
        previewImage.style.display = "block";

        reader.addEventListener("load", function () {
            previewImage.setAttribute("src", this.result);
        });

        reader.readAsDataURL(file);
    }
});





