
(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href=".html">intrawarez</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:intrawarez_feiertage" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="intrawarez/feiertage.html">feiertage</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:intrawarez_feiertage_Feiertage" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="intrawarez/feiertage/Feiertage.html">Feiertage</a>                    </div>                </li>                </ul></div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "intrawarez.html", "name": "intrawarez", "doc": "Namespace intrawarez"},{"type": "Namespace", "link": "intrawarez/feiertage.html", "name": "intrawarez\\feiertage", "doc": "Namespace intrawarez\\feiertage"},
            
            {"type": "Class", "fromName": "intrawarez\\feiertage", "fromLink": "intrawarez/feiertage.html", "link": "intrawarez/feiertage/Feiertage.html", "name": "intrawarez\\feiertage\\Feiertage", "doc": "&quot;PHP class for german holidiays.&quot;"},
                                                        {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_Jahr", "name": "intrawarez\\feiertage\\Feiertage::Jahr", "doc": "&quot;Gets either the current year or the year of a given date.&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_GaussianEasterAlgorithm", "name": "intrawarez\\feiertage\\Feiertage::GaussianEasterAlgorithm", "doc": "&quot;The Gaussian Easter Algorithm (Gauss&#039;sche Osterformel)&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_OsterSonntag", "name": "intrawarez\\feiertage\\Feiertage::OsterSonntag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_OsterMontag", "name": "intrawarez\\feiertage\\Feiertage::OsterMontag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_BussUndBettag", "name": "intrawarez\\feiertage\\Feiertage::BussUndBettag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_of", "name": "intrawarez\\feiertage\\Feiertage::of", "doc": "&quot;Creates a new Feiertage instance for a given year.&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_check", "name": "intrawarez\\feiertage\\Feiertage::check", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_getJahr", "name": "intrawarez\\feiertage\\Feiertage::getJahr", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_toArray", "name": "intrawarez\\feiertage\\Feiertage::toArray", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_contains", "name": "intrawarez\\feiertage\\Feiertage::contains", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_keyOf", "name": "intrawarez\\feiertage\\Feiertage::keyOf", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_getIterator", "name": "intrawarez\\feiertage\\Feiertage::getIterator", "doc": "&quot;Gets the iterator corresponding to the Feiertage instance.&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_offsetExists", "name": "intrawarez\\feiertage\\Feiertage::offsetExists", "doc": "&quot;Whether a date for a given offset exists.&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_offsetGet", "name": "intrawarez\\feiertage\\Feiertage::offsetGet", "doc": "&quot;Gets the date for a given offset.&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_offsetSet", "name": "intrawarez\\feiertage\\Feiertage::offsetSet", "doc": "&quot;Not Supported!&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_offsetUnset", "name": "intrawarez\\feiertage\\Feiertage::offsetUnset", "doc": "&quot;Not Supported!&quot;"},
            
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});


