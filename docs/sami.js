
window.projectVersion = 'master';

(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:maxmeffert" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="maxmeffert.html">maxmeffert</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:maxmeffert_feiertage" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="maxmeffert/feiertage.html">feiertage</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:maxmeffert_feiertage_EasterSundayCalculatorInterface" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="maxmeffert/feiertage/EasterSundayCalculatorInterface.html">EasterSundayCalculatorInterface</a>                    </div>                </li>                            <li data-name="class:maxmeffert_feiertage_Feiertag" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="maxmeffert/feiertage/Feiertag.html">Feiertag</a>                    </div>                </li>                            <li data-name="class:maxmeffert_feiertage_FeiertagAggregate" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="maxmeffert/feiertage/FeiertagAggregate.html">FeiertagAggregate</a>                    </div>                </li>                            <li data-name="class:maxmeffert_feiertage_FeiertagEnum" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="maxmeffert/feiertage/FeiertagEnum.html">FeiertagEnum</a>                    </div>                </li>                            <li data-name="class:maxmeffert_feiertage_FeiertagFactory" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="maxmeffert/feiertage/FeiertagFactory.html">FeiertagFactory</a>                    </div>                </li>                            <li data-name="class:maxmeffert_feiertage_Feiertage" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="maxmeffert/feiertage/Feiertage.html">Feiertage</a>                    </div>                </li>                            <li data-name="class:maxmeffert_feiertage_GaussianEasterSundayCalculator" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="maxmeffert/feiertage/GaussianEasterSundayCalculator.html">GaussianEasterSundayCalculator</a>                    </div>                </li>                </ul></div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "maxmeffert.html", "name": "maxmeffert", "doc": "Namespace maxmeffert"},{"type": "Namespace", "link": "maxmeffert/feiertage.html", "name": "maxmeffert\\feiertage", "doc": "Namespace maxmeffert\\feiertage"},
            {"type": "Interface", "fromName": "maxmeffert\\feiertage", "fromLink": "maxmeffert/feiertage.html", "link": "maxmeffert/feiertage/EasterSundayCalculatorInterface.html", "name": "maxmeffert\\feiertage\\EasterSundayCalculatorInterface", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "maxmeffert\\feiertage\\EasterSundayCalculatorInterface", "fromLink": "maxmeffert/feiertage/EasterSundayCalculatorInterface.html", "link": "maxmeffert/feiertage/EasterSundayCalculatorInterface.html#method_calculate", "name": "maxmeffert\\feiertage\\EasterSundayCalculatorInterface::calculate", "doc": "&quot;&quot;"},
            
            
            {"type": "Class", "fromName": "maxmeffert\\feiertage", "fromLink": "maxmeffert/feiertage.html", "link": "maxmeffert/feiertage/EasterSundayCalculatorInterface.html", "name": "maxmeffert\\feiertage\\EasterSundayCalculatorInterface", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "maxmeffert\\feiertage\\EasterSundayCalculatorInterface", "fromLink": "maxmeffert/feiertage/EasterSundayCalculatorInterface.html", "link": "maxmeffert/feiertage/EasterSundayCalculatorInterface.html#method_calculate", "name": "maxmeffert\\feiertage\\EasterSundayCalculatorInterface::calculate", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "maxmeffert\\feiertage", "fromLink": "maxmeffert/feiertage.html", "link": "maxmeffert/feiertage/Feiertag.html", "name": "maxmeffert\\feiertage\\Feiertag", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "maxmeffert\\feiertage\\Feiertag", "fromLink": "maxmeffert/feiertage/Feiertag.html", "link": "maxmeffert/feiertage/Feiertag.html#method___construct", "name": "maxmeffert\\feiertage\\Feiertag::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\Feiertag", "fromLink": "maxmeffert/feiertage/Feiertag.html", "link": "maxmeffert/feiertage/Feiertag.html#method_getDate", "name": "maxmeffert\\feiertage\\Feiertag::getDate", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\Feiertag", "fromLink": "maxmeffert/feiertage/Feiertag.html", "link": "maxmeffert/feiertage/Feiertag.html#method_getKey", "name": "maxmeffert\\feiertage\\Feiertag::getKey", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\Feiertag", "fromLink": "maxmeffert/feiertage/Feiertag.html", "link": "maxmeffert/feiertage/Feiertag.html#method_getOffset", "name": "maxmeffert\\feiertage\\Feiertag::getOffset", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\Feiertag", "fromLink": "maxmeffert/feiertage/Feiertag.html", "link": "maxmeffert/feiertage/Feiertag.html#method_getTimestamp", "name": "maxmeffert\\feiertage\\Feiertag::getTimestamp", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\Feiertag", "fromLink": "maxmeffert/feiertage/Feiertag.html", "link": "maxmeffert/feiertage/Feiertag.html#method_getTimezone", "name": "maxmeffert\\feiertage\\Feiertag::getTimezone", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\Feiertag", "fromLink": "maxmeffert/feiertage/Feiertag.html", "link": "maxmeffert/feiertage/Feiertag.html#method_format", "name": "maxmeffert\\feiertage\\Feiertag::format", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\Feiertag", "fromLink": "maxmeffert/feiertage/Feiertag.html", "link": "maxmeffert/feiertage/Feiertag.html#method_toDateTime", "name": "maxmeffert\\feiertage\\Feiertag::toDateTime", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\Feiertag", "fromLink": "maxmeffert/feiertage/Feiertag.html", "link": "maxmeffert/feiertage/Feiertag.html#method_toDateTimeImmutable", "name": "maxmeffert\\feiertage\\Feiertag::toDateTimeImmutable", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "maxmeffert\\feiertage", "fromLink": "maxmeffert/feiertage.html", "link": "maxmeffert/feiertage/FeiertagAggregate.html", "name": "maxmeffert\\feiertage\\FeiertagAggregate", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "maxmeffert\\feiertage\\FeiertagAggregate", "fromLink": "maxmeffert/feiertage/FeiertagAggregate.html", "link": "maxmeffert/feiertage/FeiertagAggregate.html#method___construct", "name": "maxmeffert\\feiertage\\FeiertagAggregate::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\FeiertagAggregate", "fromLink": "maxmeffert/feiertage/FeiertagAggregate.html", "link": "maxmeffert/feiertage/FeiertagAggregate.html#method_getJahr", "name": "maxmeffert\\feiertage\\FeiertagAggregate::getJahr", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\FeiertagAggregate", "fromLink": "maxmeffert/feiertage/FeiertagAggregate.html", "link": "maxmeffert/feiertage/FeiertagAggregate.html#method_toArray", "name": "maxmeffert\\feiertage\\FeiertagAggregate::toArray", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\FeiertagAggregate", "fromLink": "maxmeffert/feiertage/FeiertagAggregate.html", "link": "maxmeffert/feiertage/FeiertagAggregate.html#method_getDates", "name": "maxmeffert\\feiertage\\FeiertagAggregate::getDates", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\FeiertagAggregate", "fromLink": "maxmeffert/feiertage/FeiertagAggregate.html", "link": "maxmeffert/feiertage/FeiertagAggregate.html#method_toDateTimes", "name": "maxmeffert\\feiertage\\FeiertagAggregate::toDateTimes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\FeiertagAggregate", "fromLink": "maxmeffert/feiertage/FeiertagAggregate.html", "link": "maxmeffert/feiertage/FeiertagAggregate.html#method_toDateTimeImmutables", "name": "maxmeffert\\feiertage\\FeiertagAggregate::toDateTimeImmutables", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\FeiertagAggregate", "fromLink": "maxmeffert/feiertage/FeiertagAggregate.html", "link": "maxmeffert/feiertage/FeiertagAggregate.html#method_getIterator", "name": "maxmeffert\\feiertage\\FeiertagAggregate::getIterator", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\FeiertagAggregate", "fromLink": "maxmeffert/feiertage/FeiertagAggregate.html", "link": "maxmeffert/feiertage/FeiertagAggregate.html#method_offsetExists", "name": "maxmeffert\\feiertage\\FeiertagAggregate::offsetExists", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\FeiertagAggregate", "fromLink": "maxmeffert/feiertage/FeiertagAggregate.html", "link": "maxmeffert/feiertage/FeiertagAggregate.html#method_offsetGet", "name": "maxmeffert\\feiertage\\FeiertagAggregate::offsetGet", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\FeiertagAggregate", "fromLink": "maxmeffert/feiertage/FeiertagAggregate.html", "link": "maxmeffert/feiertage/FeiertagAggregate.html#method_offsetSet", "name": "maxmeffert\\feiertage\\FeiertagAggregate::offsetSet", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\FeiertagAggregate", "fromLink": "maxmeffert/feiertage/FeiertagAggregate.html", "link": "maxmeffert/feiertage/FeiertagAggregate.html#method_offsetUnset", "name": "maxmeffert\\feiertage\\FeiertagAggregate::offsetUnset", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\FeiertagAggregate", "fromLink": "maxmeffert/feiertage/FeiertagAggregate.html", "link": "maxmeffert/feiertage/FeiertagAggregate.html#method_contains", "name": "maxmeffert\\feiertage\\FeiertagAggregate::contains", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "maxmeffert\\feiertage", "fromLink": "maxmeffert/feiertage.html", "link": "maxmeffert/feiertage/FeiertagEnum.html", "name": "maxmeffert\\feiertage\\FeiertagEnum", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "maxmeffert\\feiertage\\FeiertagEnum", "fromLink": "maxmeffert/feiertage/FeiertagEnum.html", "link": "maxmeffert/feiertage/FeiertagEnum.html#method_keys", "name": "maxmeffert\\feiertage\\FeiertagEnum::keys", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "maxmeffert\\feiertage", "fromLink": "maxmeffert/feiertage.html", "link": "maxmeffert/feiertage/FeiertagFactory.html", "name": "maxmeffert\\feiertage\\FeiertagFactory", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "maxmeffert\\feiertage\\FeiertagFactory", "fromLink": "maxmeffert/feiertage/FeiertagFactory.html", "link": "maxmeffert/feiertage/FeiertagFactory.html#method___construct", "name": "maxmeffert\\feiertage\\FeiertagFactory::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\FeiertagFactory", "fromLink": "maxmeffert/feiertage/FeiertagFactory.html", "link": "maxmeffert/feiertage/FeiertagFactory.html#method_neujahrstag", "name": "maxmeffert\\feiertage\\FeiertagFactory::neujahrstag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\FeiertagFactory", "fromLink": "maxmeffert/feiertage/FeiertagFactory.html", "link": "maxmeffert/feiertage/FeiertagFactory.html#method_heiligeDreiKoenige", "name": "maxmeffert\\feiertage\\FeiertagFactory::heiligeDreiKoenige", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\FeiertagFactory", "fromLink": "maxmeffert/feiertage/FeiertagFactory.html", "link": "maxmeffert/feiertage/FeiertagFactory.html#method_gruenDonnerstag", "name": "maxmeffert\\feiertage\\FeiertagFactory::gruenDonnerstag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\FeiertagFactory", "fromLink": "maxmeffert/feiertage/FeiertagFactory.html", "link": "maxmeffert/feiertage/FeiertagFactory.html#method_karfreitag", "name": "maxmeffert\\feiertage\\FeiertagFactory::karfreitag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\FeiertagFactory", "fromLink": "maxmeffert/feiertage/FeiertagFactory.html", "link": "maxmeffert/feiertage/FeiertagFactory.html#method_osterSonntag", "name": "maxmeffert\\feiertage\\FeiertagFactory::osterSonntag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\FeiertagFactory", "fromLink": "maxmeffert/feiertage/FeiertagFactory.html", "link": "maxmeffert/feiertage/FeiertagFactory.html#method_osterMontag", "name": "maxmeffert\\feiertage\\FeiertagFactory::osterMontag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\FeiertagFactory", "fromLink": "maxmeffert/feiertage/FeiertagFactory.html", "link": "maxmeffert/feiertage/FeiertagFactory.html#method_tagDerArbeit", "name": "maxmeffert\\feiertage\\FeiertagFactory::tagDerArbeit", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\FeiertagFactory", "fromLink": "maxmeffert/feiertage/FeiertagFactory.html", "link": "maxmeffert/feiertage/FeiertagFactory.html#method_christiHimmelfahrt", "name": "maxmeffert\\feiertage\\FeiertagFactory::christiHimmelfahrt", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\FeiertagFactory", "fromLink": "maxmeffert/feiertage/FeiertagFactory.html", "link": "maxmeffert/feiertage/FeiertagFactory.html#method_pfingstSonntag", "name": "maxmeffert\\feiertage\\FeiertagFactory::pfingstSonntag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\FeiertagFactory", "fromLink": "maxmeffert/feiertage/FeiertagFactory.html", "link": "maxmeffert/feiertage/FeiertagFactory.html#method_pfingstMontag", "name": "maxmeffert\\feiertage\\FeiertagFactory::pfingstMontag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\FeiertagFactory", "fromLink": "maxmeffert/feiertage/FeiertagFactory.html", "link": "maxmeffert/feiertage/FeiertagFactory.html#method_fronleichnam", "name": "maxmeffert\\feiertage\\FeiertagFactory::fronleichnam", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\FeiertagFactory", "fromLink": "maxmeffert/feiertage/FeiertagFactory.html", "link": "maxmeffert/feiertage/FeiertagFactory.html#method_augsburgerFriedensfest", "name": "maxmeffert\\feiertage\\FeiertagFactory::augsburgerFriedensfest", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\FeiertagFactory", "fromLink": "maxmeffert/feiertage/FeiertagFactory.html", "link": "maxmeffert/feiertage/FeiertagFactory.html#method_mariaeHimmelfahrt", "name": "maxmeffert\\feiertage\\FeiertagFactory::mariaeHimmelfahrt", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\FeiertagFactory", "fromLink": "maxmeffert/feiertage/FeiertagFactory.html", "link": "maxmeffert/feiertage/FeiertagFactory.html#method_tagDerDeutschenEinheit", "name": "maxmeffert\\feiertage\\FeiertagFactory::tagDerDeutschenEinheit", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\FeiertagFactory", "fromLink": "maxmeffert/feiertage/FeiertagFactory.html", "link": "maxmeffert/feiertage/FeiertagFactory.html#method_reformationstag", "name": "maxmeffert\\feiertage\\FeiertagFactory::reformationstag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\FeiertagFactory", "fromLink": "maxmeffert/feiertage/FeiertagFactory.html", "link": "maxmeffert/feiertage/FeiertagFactory.html#method_allerheiligen", "name": "maxmeffert\\feiertage\\FeiertagFactory::allerheiligen", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\FeiertagFactory", "fromLink": "maxmeffert/feiertage/FeiertagFactory.html", "link": "maxmeffert/feiertage/FeiertagFactory.html#method_bussUndBettag", "name": "maxmeffert\\feiertage\\FeiertagFactory::bussUndBettag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\FeiertagFactory", "fromLink": "maxmeffert/feiertage/FeiertagFactory.html", "link": "maxmeffert/feiertage/FeiertagFactory.html#method_ersterWeihnachtstag", "name": "maxmeffert\\feiertage\\FeiertagFactory::ersterWeihnachtstag", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\FeiertagFactory", "fromLink": "maxmeffert/feiertage/FeiertagFactory.html", "link": "maxmeffert/feiertage/FeiertagFactory.html#method_zweiterWeihnachtstag", "name": "maxmeffert\\feiertage\\FeiertagFactory::zweiterWeihnachtstag", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "maxmeffert\\feiertage", "fromLink": "maxmeffert/feiertage.html", "link": "maxmeffert/feiertage/Feiertage.html", "name": "maxmeffert\\feiertage\\Feiertage", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "maxmeffert\\feiertage\\Feiertage", "fromLink": "maxmeffert/feiertage/Feiertage.html", "link": "maxmeffert/feiertage/Feiertage.html#method_of", "name": "maxmeffert\\feiertage\\Feiertage::of", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\Feiertage", "fromLink": "maxmeffert/feiertage/Feiertage.html", "link": "maxmeffert/feiertage/Feiertage.html#method_check", "name": "maxmeffert\\feiertage\\Feiertage::check", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "maxmeffert\\feiertage\\Feiertage", "fromLink": "maxmeffert/feiertage/Feiertage.html", "link": "maxmeffert/feiertage/Feiertage.html#method_which", "name": "maxmeffert\\feiertage\\Feiertage::which", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "maxmeffert\\feiertage", "fromLink": "maxmeffert/feiertage.html", "link": "maxmeffert/feiertage/GaussianEasterSundayCalculator.html", "name": "maxmeffert\\feiertage\\GaussianEasterSundayCalculator", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "maxmeffert\\feiertage\\GaussianEasterSundayCalculator", "fromLink": "maxmeffert/feiertage/GaussianEasterSundayCalculator.html", "link": "maxmeffert/feiertage/GaussianEasterSundayCalculator.html#method_calculate", "name": "maxmeffert\\feiertage\\GaussianEasterSundayCalculator::calculate", "doc": "&quot;Computes the date of &lt;b&gt;Easter Sunday&lt;\/b&gt; for a given year.&quot;"},
            
            
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


