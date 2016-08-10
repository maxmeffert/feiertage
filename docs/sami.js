
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
            
            {"type": "Class", "fromName": "intrawarez\\feiertage", "fromLink": "intrawarez/feiertage.html", "link": "intrawarez/feiertage/Feiertage.html", "name": "intrawarez\\feiertage\\Feiertage", "doc": "&quot;PHP Helper class for german holidiays.&quot;"},
                                                        {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_GaussianEasterAlgorithm", "name": "intrawarez\\feiertage\\Feiertage::GaussianEasterAlgorithm", "doc": "&quot;The Gaussian Easter Algorithm (Gauss&#039;sche Osterformel)&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method___construct", "name": "intrawarez\\feiertage\\Feiertage::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_getJahr", "name": "intrawarez\\feiertage\\Feiertage::getJahr", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_getNeujahrstag", "name": "intrawarez\\feiertage\\Feiertage::getNeujahrstag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_getHeiligeDreiKoenige", "name": "intrawarez\\feiertage\\Feiertage::getHeiligeDreiKoenige", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_getGruenDonnerstag", "name": "intrawarez\\feiertage\\Feiertage::getGruenDonnerstag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_getKarFreitag", "name": "intrawarez\\feiertage\\Feiertage::getKarFreitag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_getOsterSonntag", "name": "intrawarez\\feiertage\\Feiertage::getOsterSonntag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_getOsterMontag", "name": "intrawarez\\feiertage\\Feiertage::getOsterMontag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_getTagDerArbeit", "name": "intrawarez\\feiertage\\Feiertage::getTagDerArbeit", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_getChristiHimmelfahrt", "name": "intrawarez\\feiertage\\Feiertage::getChristiHimmelfahrt", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_getPfingstSonntag", "name": "intrawarez\\feiertage\\Feiertage::getPfingstSonntag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_getPfingstMontag", "name": "intrawarez\\feiertage\\Feiertage::getPfingstMontag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_getFronLeichnam", "name": "intrawarez\\feiertage\\Feiertage::getFronLeichnam", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_getAugsburgertFriedensfest", "name": "intrawarez\\feiertage\\Feiertage::getAugsburgertFriedensfest", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_getMariaeHimmelfahrt", "name": "intrawarez\\feiertage\\Feiertage::getMariaeHimmelfahrt", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_getTagDerDeutschenEinheit", "name": "intrawarez\\feiertage\\Feiertage::getTagDerDeutschenEinheit", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_getReformationstag", "name": "intrawarez\\feiertage\\Feiertage::getReformationstag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_getAllerheiligen", "name": "intrawarez\\feiertage\\Feiertage::getAllerheiligen", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_getBussUndBettag", "name": "intrawarez\\feiertage\\Feiertage::getBussUndBettag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_getErsterWeihnachtstag", "name": "intrawarez\\feiertage\\Feiertage::getErsterWeihnachtstag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_getZweiterWeihnachtstag", "name": "intrawarez\\feiertage\\Feiertage::getZweiterWeihnachtstag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_toArray", "name": "intrawarez\\feiertage\\Feiertage::toArray", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_check", "name": "intrawarez\\feiertage\\Feiertage::check", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_which", "name": "intrawarez\\feiertage\\Feiertage::which", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method___toString", "name": "intrawarez\\feiertage\\Feiertage::__toString", "doc": "&quot;&quot;"},
            
            
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


