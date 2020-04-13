$(document).ready(function () {

    $('textarea').keyup(function (el) {
        if ($(el.target).val().length > 0) {
            let btn = $(el.target).closest('.send-comment').find("button[type='submit']");
            $(btn).removeClass('disabled').addClass('send_btn').removeAttr('disabled')
        } else {
            let btn = $(el.target).closest('.send-comment').find("button[type='submit']");
            $(btn).addClass('disabled').removeClass('send_btn').attr('disabled', 'disabled');
        }
    });

    $('.close-form').click(function () {
        $(this).parent().addClass('form-hide');
    });

    let _token = $('meta[name="csrf-token"]').attr('content');
    $('.send-comment').submit(function (event) {
        event.preventDefault()
    });


    //отправить коммент
    $('.send_btn').click(function (el) {

        let parent_id = $("[name='parent_id']").val();
        let parent_comment = $("[name='comment']").val();
        let answer = $("[name='comment_answer']").val();
        let user_name = $("[name='user_name']").val();
        let comment = '';

        if (!$(el.target)[0].hasAttribute('parent_id')) {
            parent_id = '';
            user_name = '';
            comment = parent_comment;
        } else {
            comment = answer;
        }

        $.ajax({
            url: "comment",
            method: 'POST',
            dataType: 'json',
            data: {comment, _token, parent_id, user_name},
            success(data) {
                $(el.target).addClass('disabled').removeClass('send_btn').attr('disabled', 'disabled');
                $('.number-comments').html(data.count);

                if (parent_id > 0) {
                    $(`[data-id = ${parent_id}]`).parent().parent().parent().parent().append(data.html)
                } else {
                    $(el.target).parent().parent().before(data.html);
                }
                $('.send-comment form')[0].reset();
                $('.send-comment form')[1].reset();
                $('[name="parent_id"]').val('');
                $('.form-anwser').addClass('form-hide');
            },
        });
    });

    window.reply_comment = function (el) {
        const elem = $(el).attr('parent-id');
        const parent = $(el).attr('data-id');
        const name = $(el).attr('data-name');


        if (elem > 0) {
            $("[name='parent_id']").val(elem);
        } else {
            $("[name='parent_id']").val(parent);
        }
        let names = name.split(' ');
        let res = '@' + names[0] + ',';
        $('.answer_to').html(res);
        $('[name="user_name"]').val(res);

        let formWrap = $(".form-anwser");
        let form = $('.form-anwser form');
        $(form)[0].reset();
        $('.form-anwser').removeClass('form-hide');
        $(`[data-coment= ${parent}]`).append(formWrap);
    };


    window.del_comm = function (el) {
        //Удалить коммент
        let id = $(el).attr('data-id');
        let parent = $(el).attr('parent');
        $.ajax({
            url: "comment/" + id,
            method: 'DELETE',
            data: {id, _token},
            success(data) {
                if (parent > 1) {
                    let formWrap = $(".form-anwser");
                    $('body').append(formWrap);
                    $(formWrap).addClass('form-hide');
                    $(`[data-coment = ${id}]`).remove();
                } else {
                    let formWrap = $(".form-anwser");
                    $('body').append(formWrap);
                    $(formWrap).addClass('form-hide');
                    $(`[data-coment="${id}"]`).parent().remove();
                }
                $('.number-comments').html(data.count);
            }
        })
    };

  //likes
    $('.post-info .like-action').click(function () {
        let post_id = $('.project-box').attr('data-id');
        if($(this).hasClass('like')){
            //like
            $.ajax({
                url: "like",
                method: 'POST',
                dataType: 'json',
                data: {_token , post_id},
                success(data){
                    $('.like-action span').html(data);
                    $('.like-action').addClass('dislike');
                    $('.like-action').removeClass('like');
                    $('.click-heart').toggleClass('animated-heart');
                    $('.dislike').css('animation' , '.7s ease-in-out')
                }
            })
        }else {
            //dislike
            $.ajax({
                url: "like/" + 1,
                method: 'DELETE',
                dataType: 'json',
                data: {_token, post_id},
                success(data){
                    $('.like-action span').html(data);
                    $('.click-heart').toggleClass('animated-heart');
                    $('.like-action').addClass('like');
                    $('.like-action').removeClass('dislike');
                }
            })
        }

    });

});



