<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Algolia search</title>
    <script language="javascript" src="https://cdn.jsdelivr.net/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://cdn.jsdelivr.net/npm/instantsearch.js@2.0.2/dist/instantsearch.min.css">
    <script src="https://cdn.jsdelivr.net/npm/instantsearch.js@2.0.2/dist/instantsearch.min.js"></script>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.jsdelivr.net/npm/instantsearch.js@2.0.2/dist/instantsearch-theme-algolia.min.css">
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
 <style type="text/css">
        @import 'https://fonts.googleapis.com/css?family=Montserrat:400,700';
        .aa-input-container {
            display: inline-block;
            position: relative; }
        .aa-input-search {
            width: 300px;
            padding: 12px 28px 12px 12px;
            border: 2px solid #e4e4e4;
            border-radius: 4px;
            -webkit-transition: .2s;
            transition: .2s;
            font-family: "Montserrat", sans-serif;
            box-shadow: 4px 4px 0 rgba(241, 241, 241, 0.35);
            font-size: 11px;
            box-sizing: border-box;
            color: #333;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none; }
        .aa-input-search::-webkit-search-decoration, .aa-input-search::-webkit-search-cancel-button, .aa-input-search::-webkit-search-results-button, .aa-input-search::-webkit-search-results-decoration {
            display: none; }
        .aa-input-search:focus {
            outline: 0;
            border-color: #3a96cf;
            box-shadow: 4px 4px 0 rgba(58, 150, 207, 0.1); }
        .aa-input-icon {
            height: 16px;
            width: 16px;
            position: absolute;
            top: 50%;
            right: 16px;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            fill: #e4e4e4; }
        .aa-hint {
            color: #e4e4e4; }
        .aa-dropdown-menu {
            background-color: #fff;
            border: 2px solid rgba(228, 228, 228, 0.6);
            border-top-width: 1px;
            font-family: "Montserrat", sans-serif;
            width: 300px;
            margin-top: 10px;
            box-shadow: 4px 4px 0 rgba(241, 241, 241, 0.35);
            font-size: 11px;
            border-radius: 4px;
            box-sizing: border-box; }
        .aa-suggestion {
            padding: 12px;
            border-top: 1px solid rgba(228, 228, 228, 0.6);
            cursor: pointer;
            -webkit-transition: .2s;
            transition: .2s;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center; }
        .aa-suggestion:hover, .aa-suggestion.aa-cursor {
            background-color: rgba(241, 241, 241, 0.35); }
        .aa-suggestion > span:first-child {
            color: #333; }
        .aa-suggestion > span:last-child {
            text-transform: uppercase;
            color: #a9a9a9; }
        .aa-suggestion > span:first-child em, .aa-suggestion > span:last-child em {
            font-weight: 700;
            font-style: normal;
            background-color: rgba(58, 150, 207, 0.1);
            padding: 2px 0 2px 2px; }
    </style>
</head>
<body>
<div class="container">
    <div id="search-box">
        <!-- SearchBox widget will appear here -->
    </div>
    <div id="hits">
        <!-- Hits widget will appear here -->
    </div>
    <div class="aa-input-container" id="aa-input-container">
        <input type="search" id="aa-search-input" class="aa-input-search" placeholder="Search for posts" name="search" autocomplete="off" />
    </div>
</div>
</body>
<script type="text/template" id="hits-temp">
    @{{ __highlightResult.h1 }}
    <div class="row song">
        <a class="song-link" href="song/@{{objectID}}">@{{{_highlightResult.name.value}}}</a>
    </div>
</script>



<script>
    var client = algoliasearch('D7OQT9SVDL', 'c310f3221c80a3e243d88c82c65d9539')
    var index = client.initIndex('annonces');
    autocomplete('#aa-search-input',
        { hint: false }, {
            source: autocomplete.sources.hits(index, {hitsPerPage: 5}),
            //value to be displayed in input control after user's suggestion selection
            displayKey: 'name',
            //hash of templates used when rendering dataset
            templates: {
                //'suggestion' templating function used to render a single suggestion
                suggestion: function(suggestion) {
                    return '<span>' +
                        suggestion._highlightResult.name.value + '</span><span>' +
                        suggestion._highlightResult.name.value + '</span>';
                }
            }
        });
</script>
</html>