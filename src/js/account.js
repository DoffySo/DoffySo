/*
    Авторизация
 */

$('.login').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    let login = $('input[name="login"]').val(),
        password = $('input[name="password"]').val();

    $.ajax({
        url: '/vendor/login',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            password: password
        },
        success(data) {
            if (data.status) {
                alert('123')
                document.location.href = '/admin/index';
            } else {
                $(`form`).addClass('none')
                setTimeout(function () {
                    $(`form`).removeClass('none')
                    if (data.type === 1) {
                        data.fields.forEach(function (field) {
                            $(`input[name="${field}"]`).addClass('error');
                        });
                    }
                    alert(data.message);
                }, 20)
            }

        }
    });
});

/*
    Создаём аккаунт
 */

$('.new_account').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    let login = $('input[name="login"]').val(),
        password = $('input[name="password"]').val(),
        level = $('input[name="level"]').val();

    $.ajax({
        url: '/api/auth/create_account',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            password: password,
            level: level
        },
        success(data) {
            if (data.status) {
                alert('Аккаунт успешно создан')
                document.location.href = '/admin/link';
            } else {

                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('error');
                    });
                    alert(data.message)
                }
            }

        }
    });
});

/*
    Создаём пост
 */

$('.create_post').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    var date = Date.now()
    var userid = $_SESSION['admin']['id'];

    let title = $('input[name="title"]').val(),
        text = $('input[name="text"]').val(),
        datet = date,
        admin = userid;

    $.ajax({
        url: '/',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            password: password,
            datet: datet,
            adminid: admin
        },
        success(data) {
            if (data.status) {
                alert('Пост успешно отправлен на проверку')
                document.location.href = '/admin/index';
            } else {

                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('error');
                    });
                }
                $('.reaction').removeClass('none').text(data.message);
            }

        }
    });
});

$('.updatePost').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');


    let title = $('input[name="title"]').val(),
        text = $('textarea[name="text"]').val(),
        text_small = $('textarea[name="text_small"]').val(),
        theme = $('input[name="theme"]').val(),
        id = $('input[name="id"]').val();
    $.ajax({
        url: '/api/auth/post_update',
        type: 'POST',
        dataType: 'json',
        data: {
            title: title,
            text: text,
            text_small: text_small,
            theme: theme,
            id: id
        },
        success(data) {
            if (data.status) {
                alert(data.message)
                document.location.href = '/admin/index';
            } else {

                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('error');
                    });
                }
            }

        }
    });
});
$('.deletePost').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');


    let id = $('input[name="id"]').val();
    $.ajax({
        url: '/api/auth/post_update',
        type: 'POST',
        dataType: 'json',
        data: {
            id: id
        },
        success(data) {
            if (data.status) {
                alert(data.message)
                document.location.href = '/admin/index';
            } else {

                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('error');
                    });
                }
            }

        }
    });
});

$('.setUser').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');


    let login = $('input[name="login"]').val(),
        level = $('input[name="level"]').val(),
        hashed = $('.hashed').val(),
        sid = $('input[name="sid"]').val();

    $.ajax({
        url: '/api/auth/set',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            level: level,
            sid: sid,
            hashed: hashed
        },
        success(data) {
            if (data.status) {
                alert('Настройки аккаунта успешно изменены')
                document.location.href = `/admin/accounts?id=${sid}&hashed=${hashed}`;
            } else {
                alert(data.message)
            }

        }
    });
});


