const avatarInput = document.getElementById('avatar_input');
const avatarInputCover = document.getElementById('image_drag_cover');
const imageDrag = document.getElementById('image_drag');
const draggable = document.querySelector('.draggable');
const displayName = document.querySelector('.display_imageName');

//process choose file 
draggable.addEventListener('click', () => {
    avatarInput.click();
})

avatarInput.addEventListener('change', () => {
    processImage(avatarInput);
})

//process drag image to input
draggable.addEventListener("dragover", (event) => {
    event.preventDefault();
    event.stopPropagation();
    draggable.style.backgroundColor = "rgba(36, 194, 83,0.3)";
})

draggable.addEventListener("drop", (event) => {
    event.preventDefault();
    event.stopPropagation();
    draggable.style.backgroundColor = "transparent";
    avatarInput.files = event.dataTransfer.files;
    processImage(avatarInput);
})

draggable.addEventListener("dragleave", () => {
    draggable.style.backgroundColor = "transparent";
})

function processImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        console.log(reader);
        reader.onload = function (e) {
            console.log(e.target.result);
            imageDrag.src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    } else { console.log("error"); }
    displayName.querySelector('.file_name').innerHTML = avatarInput.files[0].name;
    displayName.style.display = "block";
    avatarInputCover.style.display = "block";
}