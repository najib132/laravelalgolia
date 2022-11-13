$(document).ready(function () {
    const search = instantsearch({
        appId: 'H329YTS1B5',
        apiKey: '10a91d843aaeef2d91583bfead9b339f',
        indexName: 'title',
        urlSync: false
    });

    // initialize SearchBox
    search.addWidget(
        instantsearch.widgets.searchBox({
            container: '#search-box',
            placeholder: 'Search for posts',
            wrapInput: false,
            cssClasses: {
                input: 'form-control'
            }
        })
    );

    // initialize hits widget
    search.addWidget(
        instantsearch.widgets.hits({
            container: '#hits',
            templates: {
                empty: 'No results',
                item: '<em>Hit {{objectID}}</em>: {{{_highlightResult.name.value}}}'
            }
        })
    );

    search.start();
});