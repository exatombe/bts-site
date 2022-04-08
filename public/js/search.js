(function($) {
    $.fn.autocomplete = function(words, output) {
        var startsWith = function(letters) {
            return function(word) {
                return word.lowerTitle.indexOf(letters) === 0;
            }
        }

        var matches = function(letters) {

            return letters ?
                $.grep(words, startsWith(letters)) : [];
        }

        this.keyup(function() {
            var letters = $(this).val().toLowerCase();
            output(letters, matches(letters));
        });
    };
})(jQuery);

var words = [];

var render = function($output) {
    return function(letters, matches) {
        $output.empty()

        if(matches.length) {
            var $highlight = $('<span/>')
                .text(letters)
                .addClass('highlight');

            $.each(matches, function(index, match) {
                let titleLowered = match.lowerTitle.replace(letters, '').split("").reverse();
                let title = match.title.split("").reverse();
                let replacedTitle = titleLowered.map(function(letter, index) {
                    return title[index];
                }).reverse().join("");

                var remaining = replacedTitle;
                $match = $('<li/>').addClass('match');
                $(`<a href="${match.url}">`).append($highlight.clone(), remaining).appendTo($match);
                $output.append($match);
            });
        }
    }
}

fetch("/api/search?product=").then(res=> res.json()).then(data => {
    console.log(data);
    words = data.map(item => {
        return {
            title: item.Titre,
            lowerTitle: item.Titre.toLowerCase(),
            prix: item.Prix,
            url: "/api/search?product=" + item.Titre
        }
    });
    $(`#search`).autocomplete(words.sort(), render($('.matches')));
});