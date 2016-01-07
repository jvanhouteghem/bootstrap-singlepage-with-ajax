// -------------------------------------------------------------------------

// Pagination
$.fn.pageMe = function(opts) { // opts l'objet avec les var du depart
    var $this = this, defaults = {perPage: 6, showPrevNext: false, hidePageNumbers: false}, settings = $.extend(defaults, opts);
    var listElement = $this;
    var perPage = settings.perPage;
    var children = listElement.children();
    var pager = $('.pager');

    var numItems = children.size(); // numItems c'est la pagination : début, 1,2,3 , fin ; si met numItems = 2 on affichera début,1
    var numPages = Math.ceil(numItems / perPage);
    /*if (typeof settings.childSelector != "undefined") {
        children = listElement.find(settings.childSelector);
    }

    if (typeof settings.pagerSelector != "undefined") {
        pager = $(settings.pagerSelector);
    }*/

    // -----------------------------------------------------------------------

    createPagination();

    function createPagination() {
    //console.log("Appel de createPagination()");


    pager.data("curr", 0);    

    if (settings.showPrevNext) {
        $('<li><a href="#" class="prev_link">début</a></li>').appendTo(pager);
    }

    var curr = 0;
    var customMaxPageDisplay = true;
    while (numPages > curr && (settings.hidePageNumbers == false) && customMaxPageDisplay == true) {
        $('<li><a href="#" class="page_link">' + (curr + 1) + '</a></li>').appendTo(pager);
        curr++;
        // --- 
        /*if (curr > 2) {
            customMaxPageDisplay = false;
        }*/
        // ---
    }

    if (settings.showPrevNext) {
        $('<li><a href="#" class="next_link">fin</a></li>').appendTo(pager);
    }

    pager.find('.page_link:first').addClass('active');

    // Cache le lien début au chargement
    //pager.find('.prev_link').hide();

    if (numPages <= 1) {
        pager.find('.next_link').hide();
    }

            // les page.find ne sont pas appliqués quand recrée a pagination
        pager.find('li .page_link').click(function() {
        var clickedPage = $(this).html().valueOf() - 1;
        goTo(clickedPage, perPage);
        return false;
        });

        pager.find('li .prev_link').click(function() {
            firstPage();
            //previous()
            return false;
        });

        pager.find('li .next_link').click(function() {
            //console.log("next_link");
            LastPage();
            //next();
            return false;
        });
}

    // -----------------------------------------------------------------------

    // TODO création d'une fonction updatePagination() qui va modifier la magination en cour.
    function updatePagination(){
        /*
        Efface la pagination en cour (c'est un delete de ce qui se trouve dans le div de la pagination mais laisse le div)
        Calcule une nouvelle pagination a partir du résultat fourni à la fonction

        */
        //console.log("updatePagination");
        // efface le contenu
        $('#myPager').empty();
        

        // crée une nouvelle pagination
        $('<li><a href="#" class="prev_link">début</a></li>').appendTo(pager);

        var filterNumItems = $('.filterTr:visible').size();
        //var numItems = children.size(); // numItems c'est la pagination : début, 1,2,3 , fin ; si met numItems = 2 on affichera début,1
        var filterNumPages = Math.ceil(filterNumItems / perPage);       

        var curr = 0;
        //filterNumPages = 2;
        while (filterNumPages > curr && (settings.hidePageNumbers == false)) {
            $('<li><a href="#" class="page_link">' + (curr + 1) + '</a></li>').appendTo(pager);
            curr++;
        }

        $('<li><a href="#" class="next_link">fin</a></li>').appendTo(pager);

        // les page.find ne sont pas appliqués quand recrée a pagination
        pager.find('li .page_link').click(function() {
        var clickedPage = $(this).html().valueOf() - 1;
        goTo(clickedPage, perPage);
        return false;
        });

        pager.find('li .prev_link').click(function() {
            firstPage();
            //previous()
            return false;
        });

        pager.find('li .next_link').click(function() {
            LastPage();
            //next();
            return false;
        });
    }

    // FILTRE
    // -----------------------------------------------------------------------
    // Si tape du texte et que le champ est vide on renvoit à la première page
    
    $('#filter').keyup(function() {
        // i. modifie la liste des lignes affichées
        if ($(this).val().length != 0){
                
                var rex = new RegExp($(this).val(), 'i');
                $('.searchable tr').hide();
                $('.searchable tr').filter(function() {
                    return rex.test($(this).text());
                }).show();
                console.log($('.filterTr:visible').size());
            // ii. Mise à jour de la pagination
            updatePagination();
        }
        
        if ($(this).val().length == 0){ // Si tape du texte et que le champ est vide on renvoit à la première page
            goTo(0);
            $('#myPager').empty();
            createPagination();
            // remet la pagination comme au départ
        }

                
    });

    // ----------------------------------------------------------------------- 

    pager.children().eq(1).addClass("active");
    children.hide();
    children.slice(0, perPage).show();

    /*pager.find('li .page_link').click(function() {
        var clickedPage = $(this).html().valueOf() - 1;
        goTo(clickedPage, perPage);
        return false;
    });

    pager.find('li .prev_link').click(function() {
        firstPage();
        //previous()
        return false;
    });

    pager.find('li .next_link').click(function() {
        LastPage();
        //next();
        return false;
    });*/

    /*function previous(){
        var goToPage = parseInt(pager.data("curr")) - 1;
        goTo(goToPage);
    }
     
    function next(){
        goToPage = parseInt(pager.data("curr")) + 1;
        goTo(goToPage);
    }*/
    // ---
    function firstPage() {
        var goToPage = 0;
        goTo(goToPage);
    }

    function LastPage() {
        goToPage = numPages - 1 ; //2;
        goTo(goToPage);
    }
    // ---
    function goTo(page) {
        var startAt = page * perPage,
            endOn = startAt + perPage;

        children.css('display', 'none').slice(startAt, endOn).show();

        // --- Permet d'éviter d'afficher la page suivante si elle est vide				        
        /*if (page>=1) {
            pager.find('.prev_link').show();
        }
        else {
            pager.find('.prev_link').hide();
        }*/

        /*if (page < (numPages - 1)) {
            pager.find('.next_link').show();
        } else {
            pager.find('.next_link').hide();
        }*/
        // ---
        pager.data("curr", page);
        pager.children().removeClass("active");
        pager.children().eq(page + 1).addClass("active");

    }
};

$(document).ready(function() {

    $('#autoInsert').pageMe({
        pagerSelector: '#myPager',
        showPrevNext: true,
        hidePageNumbers: false,
        perPage: 6
    });

});