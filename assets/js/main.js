const $toogle_pill = document.querySelectorAll('[data-mdb-toggle]');

if($toogle_pill){
    $toogle_pill.forEach(element => {
        element.addEventListener('click', tooglePill);
    });
}

function tooglePill(e){
    e.preventDefault();
    const current = e.target;
    $toogle_pill.forEach(element => {
        element.classList.remove('active');
    });
    current.classList.add('active');

    const $tabs = document.querySelectorAll('.tab-pane');
    $tabs.forEach(element => {
        element.classList.remove('active');
    });

    const target = document.querySelector(current.getAttribute('href'));
    target.classList.add('show');
    target.classList.add('active');
}

//FORM
const $forms = document.querySelectorAll('form');


if($forms){
    $forms.forEach(element => {
        element.addEventListener('submit', controlForm);
    });
}

function controlForm(e){
    e.preventDefault();

    const $form = e.target;
    const $inputs = $form.querySelectorAll('input');
    let nb = 0;

    if($inputs) {
        $inputs.forEach(element => {
           if(element.value.trim()=== '') {
            element.classList.add('is-invalid')
            element.classList.remove('is-valid')
            nb++;
           } else {
            element.classList.remove('is-invalid')
            element.classList.add('is-valid')
           }
        });
    }

    const $hasError = $form.querySelector('.has-error')

    if(nb === 0){
        $hasError.classList.remove('alert');
        $hasError.classList.remove('alert-danger');
        $hasError.innerHTML = "";
        $form.submit();
    } else {
        $hasError.classList.add('alert');
        $hasError.classList.add('alert-danger');
        $hasError.innerHTML = "Veuillez remplir tous les champs obligatoires";
    }
}