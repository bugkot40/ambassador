


    $('a.js_menu').on('click',  function () {
        var id = $(this).data('id');

        $.ajax({
            url: '?r=ambassador/section',
            type: 'GET',
            dataType: 'html',
            data: {
                'id': id
            },
            success: function (res) {
                $('#content_section').html(res);
               console.log(res);
            },
            error: function () {
                alert('Сбой передачи');
            }
        });
        return false; //лучше так отключать дефолтное поведение html элементов
    });

