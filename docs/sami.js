
(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href=".html">intrawarez</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:intrawarez_feiertage" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="intrawarez/feiertage.html">feiertage</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:intrawarez_feiertage_Easter" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="intrawarez/feiertage/Easter.html">Easter</a>                    </div>                </li>                            <li data-name="class:intrawarez_feiertage_Feiertag" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="intrawarez/feiertage/Feiertag.html">Feiertag</a>                    </div>                </li>                            <li data-name="class:intrawarez_feiertage_Feiertage" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="intrawarez/feiertage/Feiertage.html">Feiertage</a>                    </div>                </li>                </ul></div>                </li>                </ul></div>                </li>                </ul>';

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
            
            {"type": "Class", "fromName": "intrawarez\\feiertage", "fromLink": "intrawarez/feiertage.html", "link": "intrawarez/feiertage/Easter.html", "name": "intrawarez\\feiertage\\Easter", "doc": "&quot;A collection of functions to compute &lt;b&gt;Easter Sunday&lt;\/b&gt; for a given year.&quot;"},
                                                        {"type": "Method", "fromName": "intrawarez\\feiertage\\Easter", "fromLink": "intrawarez/feiertage/Easter.html", "link": "intrawarez/feiertage/Easter.html#method_gauss", "name": "intrawarez\\feiertage\\Easter::gauss", "doc": "&quot;Computes the \&quot;Gauss-Day-Number\&quot; of &lt;b&gt;Easter Sunday&lt;\/b&gt; for a given year.&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Easter", "fromLink": "intrawarez/feiertage/Easter.html", "link": "intrawarez/feiertage/Easter.html#method_date", "name": "intrawarez\\feiertage\\Easter::date", "doc": "&quot;Computes the date of &lt;b&gt;Easter Sunday&lt;\/b&gt; for a given year.&quot;"},
            
            {"type": "Class", "fromName": "intrawarez\\feiertage", "fromLink": "intrawarez/feiertage.html", "link": "intrawarez/feiertage/Feiertag.html", "name": "intrawarez\\feiertage\\Feiertag", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertag", "fromLink": "intrawarez/feiertage/Feiertag.html", "link": "intrawarez/feiertage/Feiertag.html#method_keys", "name": "intrawarez\\feiertage\\Feiertag::keys", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertag", "fromLink": "intrawarez/feiertage/Feiertag.html", "link": "intrawarez/feiertage/Feiertag.html#method_Neujahrstag", "name": "intrawarez\\feiertage\\Feiertag::Neujahrstag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertag", "fromLink": "intrawarez/feiertage/Feiertag.html", "link": "intrawarez/feiertage/Feiertag.html#method_HeiligeDreiKoenige", "name": "intrawarez\\feiertage\\Feiertag::HeiligeDreiKoenige", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertag", "fromLink": "intrawarez/feiertage/Feiertag.html", "link": "intrawarez/feiertage/Feiertag.html#method_GruenDonnerstag", "name": "intrawarez\\feiertage\\Feiertag::GruenDonnerstag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertag", "fromLink": "intrawarez/feiertage/Feiertag.html", "link": "intrawarez/feiertage/Feiertag.html#method_Karfreitag", "name": "intrawarez\\feiertage\\Feiertag::Karfreitag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertag", "fromLink": "intrawarez/feiertage/Feiertag.html", "link": "intrawarez/feiertage/Feiertag.html#method_OsterSonntag", "name": "intrawarez\\feiertage\\Feiertag::OsterSonntag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertag", "fromLink": "intrawarez/feiertage/Feiertag.html", "link": "intrawarez/feiertage/Feiertag.html#method_OsterMontag", "name": "intrawarez\\feiertage\\Feiertag::OsterMontag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertag", "fromLink": "intrawarez/feiertage/Feiertag.html", "link": "intrawarez/feiertage/Feiertag.html#method_TagDerArbeit", "name": "intrawarez\\feiertage\\Feiertag::TagDerArbeit", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertag", "fromLink": "intrawarez/feiertage/Feiertag.html", "link": "intrawarez/feiertage/Feiertag.html#method_ChristiHimmelfahrt", "name": "intrawarez\\feiertage\\Feiertag::ChristiHimmelfahrt", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertag", "fromLink": "intrawarez/feiertage/Feiertag.html", "link": "intrawarez/feiertage/Feiertag.html#method_PfingstSonntag", "name": "intrawarez\\feiertage\\Feiertag::PfingstSonntag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertag", "fromLink": "intrawarez/feiertage/Feiertag.html", "link": "intrawarez/feiertage/Feiertag.html#method_PfingstMontag", "name": "intrawarez\\feiertage\\Feiertag::PfingstMontag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertag", "fromLink": "intrawarez/feiertage/Feiertag.html", "link": "intrawarez/feiertage/Feiertag.html#method_Fronleichnam", "name": "intrawarez\\feiertage\\Feiertag::Fronleichnam", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertag", "fromLink": "intrawarez/feiertage/Feiertag.html", "link": "intrawarez/feiertage/Feiertag.html#method_AugsburgerFriedensfest", "name": "intrawarez\\feiertage\\Feiertag::AugsburgerFriedensfest", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertag", "fromLink": "intrawarez/feiertage/Feiertag.html", "link": "intrawarez/feiertage/Feiertag.html#method_MariaeHimmelfahrt", "name": "intrawarez\\feiertage\\Feiertag::MariaeHimmelfahrt", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertag", "fromLink": "intrawarez/feiertage/Feiertag.html", "link": "intrawarez/feiertage/Feiertag.html#method_TagDerDeutschenEinheit", "name": "intrawarez\\feiertage\\Feiertag::TagDerDeutschenEinheit", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertag", "fromLink": "intrawarez/feiertage/Feiertag.html", "link": "intrawarez/feiertage/Feiertag.html#method_Reformationstag", "name": "intrawarez\\feiertage\\Feiertag::Reformationstag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertag", "fromLink": "intrawarez/feiertage/Feiertag.html", "link": "intrawarez/feiertage/Feiertag.html#method_Allerheiligen", "name": "intrawarez\\feiertage\\Feiertag::Allerheiligen", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertag", "fromLink": "intrawarez/feiertage/Feiertag.html", "link": "intrawarez/feiertage/Feiertag.html#method_BussUndBettag", "name": "intrawarez\\feiertage\\Feiertag::BussUndBettag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertag", "fromLink": "intrawarez/feiertage/Feiertag.html", "link": "intrawarez/feiertage/Feiertag.html#method_ErsterWeihnachtstag", "name": "intrawarez\\feiertage\\Feiertag::ErsterWeihnachtstag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertag", "fromLink": "intrawarez/feiertage/Feiertag.html", "link": "intrawarez/feiertage/Feiertag.html#method_ZweiterWeihnachtstag", "name": "intrawarez\\feiertage\\Feiertag::ZweiterWeihnachtstag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertag", "fromLink": "intrawarez/feiertage/Feiertag.html", "link": "intrawarez/feiertage/Feiertag.html#method_getDate", "name": "intrawarez\\feiertage\\Feiertag::getDate", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertag", "fromLink": "intrawarez/feiertage/Feiertag.html", "link": "intrawarez/feiertage/Feiertag.html#method_getKey", "name": "intrawarez\\feiertage\\Feiertag::getKey", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertag", "fromLink": "intrawarez/feiertage/Feiertag.html", "link": "intrawarez/feiertage/Feiertag.html#method_getOffset", "name": "intrawarez\\feiertage\\Feiertag::getOffset", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertag", "fromLink": "intrawarez/feiertage/Feiertag.html", "link": "intrawarez/feiertage/Feiertag.html#method_getTimestamp", "name": "intrawarez\\feiertage\\Feiertag::getTimestamp", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertag", "fromLink": "intrawarez/feiertage/Feiertag.html", "link": "intrawarez/feiertage/Feiertag.html#method_getTimezone", "name": "intrawarez\\feiertage\\Feiertag::getTimezone", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertag", "fromLink": "intrawarez/feiertage/Feiertag.html", "link": "intrawarez/feiertage/Feiertag.html#method_format", "name": "intrawarez\\feiertage\\Feiertag::format", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertag", "fromLink": "intrawarez/feiertage/Feiertag.html", "link": "intrawarez/feiertage/Feiertag.html#method_toDateTime", "name": "intrawarez\\feiertage\\Feiertag::toDateTime", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertag", "fromLink": "intrawarez/feiertage/Feiertag.html", "link": "intrawarez/feiertage/Feiertag.html#method_toDateTimeImmutable", "name": "intrawarez\\feiertage\\Feiertag::toDateTimeImmutable", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "intrawarez\\feiertage", "fromLink": "intrawarez/feiertage.html", "link": "intrawarez/feiertage/Feiertage.html", "name": "intrawarez\\feiertage\\Feiertage", "doc": "&quot;PHP class for german holidiays.&quot;"},
                                                        {"type": "Method", "fromName": "intrawarez\\feiertage\\Feiertage", "fromLink": "intrawarez/feiertage/Feiertage.html", "link": "intrawarez/feiertage/Feiertage.html#method_Jahr", "name": "intrawarez\\feiertage\\Feiertage::Jahr", "doc": "&quot;Gets either the current year or the year of a given date.&quot;"},
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


