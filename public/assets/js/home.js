const picture = document.querySelector('#picture');
const filename = document.querySelector('#filename');
const deletePictureButton = document.querySelector('#deletePicture');
const form = document.querySelector('#contactForm');
const radioButtons = document.querySelectorAll('.radio_notation');

// if a file is ready to upload
picture.addEventListener('input', function () {
    if (picture.files.length) {
        let name = picture.files[0].name;
        filename.textContent = name;
        deletePictureButton.disabled = false;
    }
});

// Delete button disable if file deleted for uploading
deletePictureButton.addEventListener('click', function () {
    deletePictureButton.disabled = true;
    picture.value = null;
    filename.textContent = "Choisissez un fichier...";
});

// Prevent default behavior
form.addEventListener('submit', function (e) {
    e.preventDefault();
    if (picture.files.length && atLeastOneChecked(radioButtons) && document.getElementById('nickname').value.length && document.getElementById('email').value.length && document.getElementById('comment').value.length) {
        e.target.submit();
    }
});

// Function to check if one notation radio is checked
function atLeastOneChecked(nodes) {
    let flag = false;
    nodes.forEach(radio => {
        if (radio.checked) {
            flag = !flag;
        }
    });
    return flag;
}