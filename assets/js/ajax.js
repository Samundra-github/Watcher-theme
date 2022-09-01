// Load Movies

$(function ($) {
    $(".load-more-movie").click(function (e) {
        e.preventDefault();
        var button = $(this),
            data = {
                action: "loadmore_movie_queried",
                limit: limit_movie,
                page: page_movie,
                form: $(".movie_query_search").val(),
            };
        console.log(data);
        $.ajax({
            url: loadmore_params.ajaxurl,
            data: data,
            type: "POST",
            success: function (data) {
                if (data) {
                    $(".load-movie-all").append(data);
                    page_movie++;
                    if (page_movie == max_pages_latest_movie)
                        button.css("display", "none"); // if last page, remove the button
                } else {
                    button.css("display", "none"); // if no data, remove the button as well
                }
            },
        });
    });
});


// Load Music

$(function ($) {
    $(".load-more-music").click(function (e) {
        e.preventDefault();
        var button = $(this),
            data = {
                action: "loadmore_music_queried",
                limit: limit_music,
                page: page_music,
                form: $(".music_query_search").val(),
            };
        console.log(data);
        $.ajax({
            url: loadmore_params.ajaxurl,
            data: data,
            type: "POST",
            success: function (data) {
                if (data) {
                    $(".load-music-all").append(data);
                    page_music++;
                    if (page_music == max_pages_latest_music)
                        button.css("display", "none"); // if last page, remove the button
                } else {
                    button.css("display", "none"); // if no data, remove the button as well
                }
            },
        });
    });
});