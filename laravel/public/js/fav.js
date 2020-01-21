$(function () {
    $('.fav_btn').on('click', function (e) {
		console.log('.fav_btn was clicked')
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
			type: 'POST',
            url: 'favpost',
            // crossDomain: true, // ?
            contentType: '',
			accepts: '*/*', // ?
            xhrFields: { // ?
                withCredentials: true
            },
            processData: false, // ?
            datatype: '',
            data: "",
        }).done(function (data) {
            console.log('ajax done');
        }).fail(function (data) {
            console.log('ajax failed');
        })
    })
})
