const queryVariables = document.querySelector('#variables');
const queryFilter = document.querySelector('#filter');

const notesOption = document.querySelector('#notes_option');

queryFilter.addEventListener('change', function(e) {
    if(queryFilter.value !== 'all') {
        queryVariables.options[0].selected = true;
        notesOption.disabled = true;
    } else {
        notesOption.disabled = false;
    }
});