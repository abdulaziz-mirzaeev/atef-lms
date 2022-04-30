$(document).ready(function () {
    if ($('input[type=radio][name="is-new"]').val() === "false") {
        $('.person-form input').prop('disabled', true);
    }

    $('input[type=radio][name="is-new"]').change(function () {
        if (this.value === "false") {
            $('.person-form input').prop('disabled', true);
            $('[name=person], #person_id').prop('disabled', false);
        } else {
            $('.person-form input').prop('disabled', false);
            $('[name=person], #person_id').prop('disabled', true);
        }
    });

    $('input[name=person]').on('typeahead:select', function (ev, suggestion) {
        console.log(suggestion);

        let formPerson = $('.person-form');

        $('#person_id').val(suggestion.id);

        $('[name="Person[first_name]"]', formPerson).val(suggestion.first_name);
        $('[name="Person[last_name]"]', formPerson).val(suggestion.last_name);
        $('[name="Person[middle_name]"]', formPerson).val(suggestion.middle_name);
        $(`[name="Person[gender]"][value=${suggestion.gender}]`, formPerson).prop('checked', true);
        $('[name="Person[birthday]"]', formPerson).val(suggestion.birthday);
        $('[name="Person[email]"]', formPerson).val(suggestion.email);
    })
})