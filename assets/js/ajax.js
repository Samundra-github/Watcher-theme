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

// Search Movies

$(function ($) {
    $(".submit").on("click", function (e) {
        e.preventDefault();
        var data = {
            action: "loadmore_search",
            form: $(".movie").serializeArray(),
        };
        console.log(data);
        $.ajax({
            url: loadmore_params.ajaxurl,
            data: data,
            type: "POST",
            success: function (data) {
                $(".load-movie-all").html(data);
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


// Search Music

$(function ($) {
    $(".music_query_search").on("input", function (e) {
        e.preventDefault();
        var data = {
            action: "loadmore_search_music",
            form: $(this).val(),
        };
        console.log(data);
        $.ajax({
            url: loadmore_params.ajaxurl,
            data: data,
            type: "POST",
            success: function (data) {
                $(".load-music-all").html(data);
            },
        });
    });
});


// Add to Cart Music


$(document).ready(function () {
    $('#send').submit(function (e) {
        $.ajax({
            type: "POST",
            url: "",
            data: $('#send').serialize(),
            success: function (data) {
                console.log(data);
            }
        })
        e.preventDefault();
    })
})