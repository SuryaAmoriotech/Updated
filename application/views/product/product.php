<?php error_reporting(1);  ?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.base64.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/html2canvas.js"></script>
 <script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.plugin.autotable"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.umd.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
 <script type="text/javascript" src="<?php echo base_url()?>my-assets/js/tableManager.js"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script type="text/javascript" src="http://mrrio.github.io/jsPDF/dist/jspdf.debug.js"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<script type="text/javascript" src="http://www.bacubacu.com/colresizable/js/colResizable-1.5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/drag_drop_index_table.js"></script>
<style>
.Row {
    display: table;
    width: 100%; /*Optional*/
    table-layout: fixed; /*Optional*/
    border-spacing: 5px; /*Optional*/
}
.Column {
    display: table-cell;
 
}
  </style>


<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
           
            <h1><?php echo display('manage_product') ?></h1>
            <small><?php //echo display('manage_your_product') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('product') ?></a></li>
                <li class="active" style="color:orange;"><?php echo display('manage_product') ?></li>
            </ol>

 
     
        </div>
    </section>

    <section class="content">

        <!-- Alert Message -->
        <?php
     //   error_reporting(1);
                $message = $this->session->userdata('message');
        if (isset($message)) {
            ?>
            <div class="alert alert-info alert-dismissable" style="background-color:#38469f;color:white;font-weight:bold;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $message ?>                    
            </div>
            <?php
            $this->session->unset_userdata('message');
        }
        $error_message = $this->session->userdata('error_message');
        if (isset($error_message)) {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error_message ?>                    
            </div>
            <?php
            $this->session->unset_userdata('error_message');
        }
        ?>




<style>
    th {
    padding: 10px !important;
    }
    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
vertical-align: middle;
    }
.search_dropdown{
   background:center;
   
}
th{
    color:black;
}
.select2{
    display:none;
}

    </style>
<script>
  (function ($) {
    /* Initialize function */
    $.fn.tablemanager = function (options = null) {
        /**
        Get common variables, parts of tables and others utilities
        **/
        var Table   = $(this),
            Heads   = $(this).find("thead th"),
            tbody   = $(this).find("tbody"),
            rows    = $(this).find("tbody tr"),
            rlen    = rows.length,
            arr     = [],
            cells,
            clen;

        /**
        Options default values
        **/
        var firstSort       = [[0, 0]],
            dateColumn      = [],
            dateFormat      = [],
            disableFilterBy = [];

        /**
        Debug value true or false
        **/
        var debug = false;
        var debug = options !== null && options.debug == true ? true : false;

        /**
        Set pagination true or false
        **/
        var pagination = false;
        pagination =
            options !== null && options.pagination == true ? true : false;
        // default pagination variables
        var currentPage = 0;
        var numPerPage =
            pagination !== true && showrows_option !== true ? rows.length : 5;
        var numOfPages = options.numOfPages !== undefined && options.numOfPages > 0 ? options.numOfPages : 5;

        /**
        Set default show rows list or set if option is set
        **/
        var showrows = [5, 10, 50];
        showrows =
            options !== null &&
            options.showrows != "" &&
            typeof options.showrows !== undefined &&
            options.showrows !== undefined
                ? options.showrows
                : showrows;

        /**
        Default labels translations
        **/
        var voc_filter_by = "Filter by",
            voc_type_here_filter = "Type here to filter...",
            voc_show_rows = "Show rows";

        /**
        Available options:
        **/
        var availableOptions = new Array();
        availableOptions = [
            "debug",
            "firstSort",
            "disable",
            "appendFilterby",
            "dateFormat",
            "pagination",
            "showrows",
            "vocabulary",
            "disableFilterBy",
            "numOfPages"
        ];

        // debug
        // make array form options object
        arrayOptions = $.map(options, function (value, index) {
            return [index];
        });
        for (i = 0; i < arrayOptions.length; i++) {
            // check if options are in available options array
            if (availableOptions.indexOf(arrayOptions[i]) === -1) {
                if (debug) {
                    cLog(
                        "Error! " + arrayOptions[i] + " is unavailable option."
                    );
                }
            }
        }

        /**
        Get options if set
        **/
        if (options !== null) {
            /**
            Check options vocabulary
            **/
            if (
                options.vocabulary != "" &&
                typeof options.vocabulary !== undefined &&
                options.vocabulary !== undefined
            ) {
                // Check every single label

                voc_filter_by =
                    options.vocabulary.voc_filter_by != "" &&
                    options.vocabulary.voc_filter_by !== undefined
                        ? options.vocabulary.voc_filter_by
                        : voc_filter_by;

                voc_type_here_filter =
                    options.vocabulary.voc_type_here_filter != "" &&
                    options.vocabulary.voc_type_here_filter !== undefined
                        ? options.vocabulary.voc_type_here_filter
                        : voc_type_here_filter;

                voc_show_rows =
                    options.vocabulary.voc_show_rows != "" &&
                    options.vocabulary.voc_show_rows !== undefined
                        ? options.vocabulary.voc_show_rows
                        : voc_show_rows;
            }

            /**
            Option disable
            **/
            if (
                options.disable != "" &&
                typeof options.disable !== undefined &&
                options.disable !== undefined
            ) {
                for (var i = 0; i < options.disable.length; i++) {
                    // check if should be disabled last column
                    col =
                        options.disable[i] == -1 || options.disable[i] == "last"
                            ? Heads.length
                            : options.disable[i] == "first"
                            ? 1
                            : options.disable[i];
                    Heads.eq(col - 1)
                        .addClass("disableSort")
                        .removeClass("sortingAsc")
                        .removeClass("sortingDesc");

                    // debug
                    if (isNaN(col - 1)) {
                        if (debug) {
                            cLog('Error! Check your "disable" option.');
                        }
                    }
                }
            }

            /**
            Option select number of rows to show
            **/
            var showrows_option = false;
            if (
                options.showrows != "" &&
                typeof options.showrows !== undefined &&
                options.showrows !== undefined
            ) {
                showrows_option = true;

                // div num rows
                var numrowsDiv =
                    '<div id="for_numrows"  class="for_numrows" style="display: inline;"><label for="numrows">' +
                    translate(voc_show_rows) +
                    ': </label><select id="numrows"></select></div>';
                // append div to choose num rows to show
                Table.before(numrowsDiv);
                // get show rows options and append select to its div
                for (i = 0; i < showrows.length; i++) {
                    $("select#numrows").append(
                        $("<option>", {
                            value: showrows[i],
                            text: showrows[i],
                        })
                    );

                    // debug
                    if (isNaN(showrows[i])) {
                        if (debug) {
                            cLog(
                                'Error! One of your "show rows" options is not a number.'
                            );
                        }
                    }
                }

                var selectNumRowsVal = $("select#numrows").val();
                numPerPage = selectNumRowsVal;
                // on select num rows change get value and call function
                $("select#numrows").on("change", function () {
                    selectNumRowsVal = $(this).val();
                    // reset current page to show always first page if select change
                    currentPage = 0;
                    generatePaginationValues();
                });
            }

            /**
            Pagination
            **/
            if (pagination === true || Table.hasClass("tablePagination")) {
                var numPages = Math.ceil(rows.length / numPerPage);

                // append num pages on bottom
                var pagesDiv =
                    '<div id="pagesControllers" class="pagesControllers"></div>';
                Table.after(pagesDiv);

                // Showrows option and append
                // If showrows is set get select val
                if (showrows_option !== true) {
                    var selectNumRowsVal = numPerPage;
                }

                generatePaginationValues();
            }

            /**
            Check if disable filter by is empty or undefined
            **/
            if (
                options.disableFilterBy != "" &&
                typeof options.disableFilterBy !== undefined &&
                options.disableFilterBy !== undefined
            ) {
                for (var i = 0; i < options.disableFilterBy.length; i++) {
                    // check if should be disabled last column
                    col =
                        options.disableFilterBy[i] == -1 ||
                        options.disableFilterBy[i] == "last"
                            ? Heads.length
                            : options.disableFilterBy[i] == "first"
                            ? 1
                            : options.disableFilterBy[i];
                    Heads.eq(col - 1).addClass("disableFilterBy");

                    // debug
                    if (isNaN(col - 1)) {
                        if (debug) {
                            cLog('Error! Check your "disableFilterBy" option.');
                        }
                    }
                }
            }

            /**
            Append filter option
            **/
            if (
                options.appendFilterby === true ||
                Table.hasClass("tableFilterBy")
            ) {
                // Create div and select to filter
                var filterbyDiv =
                    '<div id="for_filter_by" class="for_filter_by" style="display: none;"><label for="filter_by">' +"   "+
                    " Filter By"+
                    ': </label><select id="filter_by"></select> <input id="filter_input" type="text" placeholder="' +
                    translate(voc_type_here_filter) +
                    '"></div>';
                $(this).before(filterbyDiv);
                

                // Populate select with every th text and as value use column number
                $(Heads).each(function (i) {
                    if (!$(this).hasClass("disableFilterBy")) {
                        $("select#filter_by").append(
                            $("<option>", {
                                value: i,
                                text: $(this).text(),
                            })
                        );
                    }
                });

                // Filter on typing selecting column by select #filter_by
                $("input#filter_input").on("keyup", function () {
                    var val = $.trim($(this).val())
                        .replace(/ +/g, " ")
                        .toLowerCase();
                    var select_by = $("select#filter_by").val();

                    Table.find("tbody tr")
                        .show()
                        .filter(function () {
                            // search into column selected by #filter_by
                            var text = $(this)
                                .find("td:eq(" + select_by + ")")
                                .text()
                                .replace(/\s+/g, " ")
                                .toLowerCase();
                            return !~text.indexOf(val);
                        })
                        .hide();
                        
                    if(val == '') paginate();
                });
            }

            /**
            Date format option
            **/
            if (
                options.dateFormat != "" &&
                typeof options.dateFormat !== undefined &&
                options.dateFormat !== undefined
            ) {
                for (i = 0; i < options.dateFormat.length; i++) {
                    dateColumn.push(options.dateFormat[i][0] - 1);
                    dateFormat.push([
                        options.dateFormat[i][0] - 1,
                        options.dateFormat[i][1],
                    ]);
                }
                // check if column has table manager data attribute
                Heads.each(function (col) {
                    if (
                        $(this).data("tablemanager") &&
                        $(this).data("tablemanager").dateFormat !== undefined
                    ) {
                        var dateF = $(this).data("tablemanager").dateFormat;
                        dateColumn.push(col);
                        dateFormat.push([col, dateF]);
                    }
                });
            }

            /**
            Check if first element to sort is empty or undefined
            **/
            if (
                options.firstSort != "" &&
                typeof options.firstSort !== undefined &&
                options.firstSort !== undefined
            ) {
                var firstSortColumn = [];
                var firstSortRules = options.firstSort;
                var firstSortOrder = [];
                for (i = 0; i < options.firstSort.length; i++) {
                    firstSortColumn.push(options.firstSort[i][0]);
                    firstSortOrder.push(options.firstSort[i][1]);
                }
                TableSort(firstSortRules);
            }
        }
        if (debug) {
            cLog("Options set:", options);
        }

        /**
        Detect theads click and sort by that column
        **/
        Heads.each(function (n) {
            // check if has class disableSort or has data-attribute = disable
            var disable =
                $(this).data("tablemanager") === "disable"
                    ? true
                    : $(this).hasClass("disableSort")
                    ? true
                    : false;

            if (!disable === true) {
                $(this).on("click", function () {
                    if ($(this).hasClass("sortingAsc")) {
                        $(Heads)
                            .removeClass("sortingAsc")
                            .removeClass("sortingDesc");
                        $(this).addClass("sortingDesc");
                        order = 1;
                    } else {
                        $(Heads)
                            .removeClass("sortingDesc")
                            .removeClass("sortingAsc");
                        $(this).addClass("sortingAsc");
                        order = 0;
                    }
                    // TableSort(this, n, order);
                    var sortRules = [];
                    sortRules.push([n + 1, order]);
                    TableSort(sortRules);
                });
                $(this).addClass("sorterHeader");
            }
        });

        /**
        Main function: sort table
        rules = array of column, order
        **/
        function TableSort(rules) {
            cellsArray = [];
            for (i = 0; i < rlen; i++) {
                cells = rows[i].cells;
                clen = cells.length;
                cellsArray[i] = [];
                for (j = 0; j < clen; j++) {
                    cellsArray[i].push(cells[j].outerHTML);
                }
            }
            // For each firtsort rule
            var firstSortData = [];
            for (i = 0; i < rules.length; i++) {
                var col = rules[i][0] - 1;
                var thead = Heads.eq(col);
                var order =
                    rules[i][1] == undefined
                        ? 0
                        : rules[i][1] == 0 || rules[i][1] == "asc"
                        ? 0
                        : rules[i][1] == 1 || rules[i][1] == "desc"
                        ? 1
                        : 0;
                // Manage classes asc and desc
                if (i == 0) {
                    var firstClassOrder =
                        order == 0 ? "sortingAsc" : "sortingDesc";
                    $(thead).addClass(firstClassOrder);
                }
                asc = order == 0 ? 1 : -1;
                // if column is date
                if (dateColumn.indexOf(col) != -1) {
                    for (j = 0; j < dateFormat.length; j++) {
                        if (dateFormat[j][0] == col) {
                            var type = "date";
                            var format = dateFormat[j][1];
                        }
                    }
                } else {
                    var type = "alphanumeric";
                    var format = null;
                }
                firstSortData.push([col, asc, type, format]);
            }

            multipleSortCol(cellsArray, firstSortData);

            appendSortedTable(cellsArray);
        }

        /** 
        Function which sort columns
        array = what have to be sorted
        data = columns, orders (asc and desc), types(alphanum or date), formats (for dates)
        **/
        function multipleSortCol(array, data) {
            var cols = [];
            var orders = [];
            var types = [];
            var formats = [];
            for (i = 0; i < data.length; i++) {
                cols.push(data[i][0]);
                orders.push(data[i][1]);
                types.push(data[i][2]);
                formats.push(data[i][3]);
            }
            array.sort(function (a, b) {
                for (i = 0; i < cols.length; i++) {
                    // initialize variables
                    var first = "",
                        second = "";
                    var order = orders[i];
                    // get inner text from stringified elements
                    let firstCol = new DOMParser().parseFromString(
                        a[cols[i]],
                        "text/html"
                    ).documentElement.textContent;
                    let secondCol = new DOMParser().parseFromString(
                        b[cols[i]],
                        "text/html"
                    ).documentElement.textContent;
                    // If it's last col selected and a = b return 0
                    if (i == cols.length && firstCol == secondCol) {
                        return 0;
                    }
                    // check col type if is aplhpanum or date
                    if (types[i] == "alphanumeric") {
                        if (firstCol > secondCol) {
                            return order;
                        } else if (firstCol < secondCol) {
                            return -1 * order;
                        }
                    } else if (types[i] == "date") {
                        if (
                            formatDate(formats[i], firstCol) >
                            formatDate(formats[i], secondCol)
                        ) {
                            return order;
                        } else if (
                            formatDate(formats[i], firstCol) <
                            formatDate(formats[i], secondCol)
                        ) {
                            return -1 * order;
                        }
                    }
                }
            });
        }

        /**
        Append sorted table
        arr = array with table html
        **/
        function appendSortedTable(arr) {
            // create rows and cells by sorted array
            // for(i = 0; i < rlen; i++){
            //     arr[i] = "<td>"+arr[i].join("</td><td>")+"</td>";
            // };
            // reset tbody
            tbody.html("");
            // append new sorted rows
            tbody.html("<tr>" + arr.join("</tr><tr>") + "</tr>");
            // then launch paginate function (if options.paginate = false it will not do anything)
            paginate();
        }

        /**
        Format date
        dateFormat = the date format passed by user
        date = date to format
        **/
        function formatDate(dateFormat, date) {
            var $date = date;
            // debug variable
            var format = 0;
            if (dateFormat == "ddmmyyyy") {
                $date = date.replace(
                    /(\d{1,2})[\/\-](\d{1,2})[\/\-](\d{4})/,
                    "$3$2$1"
                );
                format = 1;
            }
            if (dateFormat == "mmddyyyy") {
                $date = date.replace(
                    /(\d{1,2})[\/\-](\d{1,2})[\/\-](\d{4})/,
                    "$3$1$2"
                );
                format = 1;
            }
            if (dateFormat == "dd-mm-yyyy") {
                $date = date.replace(
                    /(\d{1,2})[\/\-](\d{1,2})[\/\-](\d{4})/,
                    "$3-$2-$1"
                );
                format = 1;
            }
            if (dateFormat == "mm-dd-yyyy") {
                $date = date.replace(
                    /(\d{1,2})[\/\-](\d{1,2})[\/\-](\d{4})/,
                    "$3-$1-$2"
                );
                format = 1;
            }
            if (dateFormat == "dd/mm/yyyy") {
                $date = date.replace(
                    /(\d{1,2})[\/\-](\d{1,2})[\/\-](\d{4})/,
                    "$3/$2/$1"
                );
                format = 1;
            }
            if (dateFormat == "mm/dd/yyyy") {
                $date = date.replace(
                    /(\d{1,2})[\/\-](\d{1,2})[\/\-](\d{4})/,
                    "$3/$1/$2"
                );
                format = 1;
            }
            // For debugging
            if (format == 0) {
                if (debug) {
                    cLog('Error! Unvalid "date format".');
                }
            }

            return $date;
        }

        /**
        Generate page values: if numrows are selected or not it organize every value needed by pagination function and others
        **/
        function generatePaginationValues() {
            // get first select num rows value
            numPerPage = selectNumRowsVal;
            numPages = Math.ceil(rows.length / numPerPage);
            // append first controllers for pages
            appendPageControllers(numPages);
            // Give currentPage class to first page number
            $(".pagecontroller-num").eq(0).addClass("currentPage");
            paginate(currentPage, numPerPage);
            pagecontrollersClick();
            filterPages();
        }

        /**
        Pagination function: reorganize entire table by pages
        curPage = (can be null) current page if it's set
        perPage = (can be null) number of rows per page
        **/
        function paginate(curPage = null, perPage = null) {
            var curPage = curPage === null ? currentPage : curPage;
            var perPage = perPage === null ? numPerPage : perPage;
            Table.on("paginating", function () {
                $(this)
                    .find("tbody tr")
                    .hide()
                    .slice(curPage * perPage, (curPage + 1) * perPage)
                    .show();
            });
            Table.trigger("paginating");
        }

        /**
        Page controllers append: generate page controllers and append them on bottom of table
        **/
        function appendPageControllers(nPages) {
            // reset div
            $("#pagesControllers").html("");
            // First
            $("#pagesControllers").append(
                $("<button>", {
                    value: "first",
                    text: "<<",
                    class: "pagecontroller pagecontroller-f",
                })
            );
            // Previous
            $("#pagesControllers").append(
                $("<button>", {
                    value: "prev",
                    text: "<",
                    class: "pagecontroller pagecontroller-p",
                })
            );
            // Numbers
            for (i = 1; i <= nPages; i++) {
                $("#pagesControllers").append(
                    $("<button>", {
                        value: i,
                        text: i,
                        class: "pagecontroller pagecontroller-num",
                    })
                );
            }
            // Next
            $("#pagesControllers").append(
                $("<button>", {
                    value: "next",
                    text: ">",
                    class: "pagecontroller pagecontroller-n",
                })
            );
            // Last
            $("#pagesControllers").append(
                $("<button>", {
                    value: "last",
                    text: ">>",
                    class: "pagecontroller pagecontroller-l",
                })
            );
        }

        /**
        Page controllers click: check if pagecontroller has clicked and change page to view
        **/
        function pagecontrollersClick() {
            $(".pagecontroller").on("click", function () {
                // on click on button do something
                if ($(this).val() == "first") {
                    currentPage = 0;
                    paginate(currentPage, numPerPage);
                } else if ($(this).val() == "last") {
                    currentPage = numPages - 1;
                    paginate(currentPage, numPerPage);
                } else if ($(this).val() == "prev") {
                    if (currentPage != 0) {
                        currentPage = currentPage - 1;
                        paginate(currentPage, numPerPage);
                    }
                } else if ($(this).val() == "next") {
                    if (currentPage != numPages - 1) {
                        currentPage = currentPage + 1;
                        paginate(currentPage, numPerPage);
                    }
                } else {
                    currentPage = $(this).val() - 1;
                    paginate(currentPage, numPerPage);
                }
                // Reset class and give to currentPage
                $(".pagecontroller-num").removeClass("currentPage");
                $(".pagecontroller-num")
                    .eq(currentPage)
                    .addClass("currentPage");

                filterPages();
            });
        }

        function filterPages() {
            $(".pagecontroller-num")
                .hide()    
                .filter(function(i, el) {
                    let mid = Math.ceil(numOfPages / 2);
                    if (currentPage < mid) {
                        if(i < numOfPages) return true;
                    } else if(currentPage > (numPages - (numOfPages - 1))) {
                        if(i >= numPages - numOfPages) return true;
                    } else {
                        if(numOfPages % 2 == 0) {
                            if(i >= currentPage - mid && i < currentPage + mid) return true;
                        } else {
                            if(i > currentPage - mid && i < currentPage + mid) return true;
                        }
                    }
                })
                .show();
        }

        /**
        Translating function
        string = string to be translated
        **/
        function translate(string) {
            return string;
        }

        /**
        Debug function
        name = label for data
        string = string to pass by console.log
        **/
        function cLog(name, string = null) {
            console.log(name);
            if (string != null) {
                console.log(JSON.parse(JSON.stringify(string)));
            }
        }
    };
})(jQuery);

    </script>
        <!-- Manage Product report -->

  <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
  
                         <div id="block_container">
                                <div id="bloc1" >
                              
                               </div> 
                               <div class="col-sm-4">
                               
                









    <?php    foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='product' && $_SESSION['u_type'] ==3 && trim($split[1])=='1000'){
      
      
       ?>

<a href="<?php echo base_url('Cproduct') ?>" class="btn btnclr" style="background-color: #3CA5DE; color: #fff;" ><i class="ti-plus"> </i> <?php echo display('add_product') ?> </a>
                    
                    <?php break;}} 
                    if($_SESSION['u_type'] ==2){ ?>

<a href="<?php echo base_url('Cproduct') ?>" class="btn btnclr" style="background-color: #3CA5DE; color: #fff;" ><i class="ti-plus"> </i> <?php echo display('add_product') ?> </a>

                        <?php  } ?>














<!--<?php //if($this->permission1->method('add_product_csv','create')->access()){ ?>-->
                    <a href="<?php echo base_url('Cproduct/add_product_csv') ?>" class="btn btnclr" style="background-color: #3CA5DE; color: #fff;" ><i class="ti-plus"> </i>  <?php echo display('add_product_csv') ?> </a>
                  <!--  <?php// }?> -->    

</div>
<br/>
                             <div id="bloc2" style="float:right;">
<a style="float:right;" id="s_icon"><i class="fa fa-search"   aria-hidden="true"></i></a>
                               <i class="fa fa-cog"  aria-hidden="true" id="myBtn" style="font-size:25px;padding-right: 30px;" onClick="columnSwitchMODAL()"></i>
                                      <div class="dropdown bootcol" id="drop" style="float:right;padding-right:20px;padding-bottom:10px;">
    <button class="btn btnclr dropdown-toggle" type="button" id="dropdownMenu1" style="padding: revert;background-color:#38469f;color:white;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
       <span class="glyphicon glyphicon-th-list"></span> <?php  echo display('download')?>
     
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
   
  
                
      <li><a href="#" onclick="pdf()"> <img src="<?php echo base_url()?>assets/images/pdf.png" width="24px"> <?php  echo display('pdf')?></a></li>
      
      <li class="divider"></li>         
                  
      <li><a href="#" onclick="fnExcelReport();"> <img src="<?php echo base_url()?>assets/images/xls.png" width="24px"> X<?php  echo display('XLS')?></a></li>
                 
    </ul>
  </div>
                            

                 

                   
                     </div>    </div>

<br/>

                        </div>
                    </div>

                    
                    <div id="search_area" style="border:2px solid #004d99;border-radius:5px;">
                      <table class="table">
        <thead>
 <tr class="filters">
            <th class="search_dropdown"><span><?php echo display('product_name') ?> </span>
              <select id="pname-filter" class="form-control">
                 <option>Any</option>
                <?php 
               $product_name = array();
foreach ($products as $product) {
    $product_name[] = $product['product_name'];
}
$unique_product = array_unique($product_name);

               $product_model = array();
foreach ($products as $product) {
    $product_model[] = $product['product_model'];
}
$unique_model = array_unique($product_model);

               $category = array();
foreach ($products as $product) {
    $category[] = $product['category_id'];
}
$unique_category = array_unique($category);


               $unit = array();
foreach ($products as $product) {
    $unit[] = $product['unit'];
}
$unique_unit = array_unique($unit);

               $supplier_name = array();
foreach ($products as $product) {
    $supplier_name[] = $product['supplier_name'];
}
$unique_supplier_name = array_unique($supplier_name);
                foreach($unique_product as $product){  ?>
                <option value="<?php echo $product; ?>"><?php echo $product; ?></option>
             <?php }  ?>
              </select>
            </th>
            <th class="search_dropdown"><span><?php echo  display('product_model')?></span>
              <select id="model-filter" class="form-control">
                <option>Any</option>
                 <?php foreach($unique_model as $product){  ?>
                <option value="<?php echo $product; ?>"><?php echo $product; ?></option>
             <?php }  ?>
              </select>
            </th>
            <th class="search_dropdown"><span><?php echo  display('category')?> </span>
              <select id="category-filter" class="form-control">
                <option>Any</option>
                 <?php foreach($unique_category as $product){  ?>
                <option value="<?php echo $product; ?>"><?php echo $product; ?></option>
             <?php }  ?>
              </select>
            </th>
            <th class="search_dropdown"><span><?php echo  display('Unit')?></span>
              <select id="unit-filter" class="form-control">
                <option>Any</option>
                 <?php foreach($unique_unit as $product){  ?>
                <option value="<?php echo $product; ?>"><?php echo $product; ?></option>
             <?php }  ?>
              </select>
            </th>
            <th class="search_dropdown"><span><?php echo  display('Vendor')?></span>
              <select id="supplier-filter" class="form-control">
                <option>Any</option>
                <?php foreach($unique_supplier_name as $product){  ?>
                <option value="<?php echo $product; ?>"><?php echo $product; ?></option>
             <?php }  ?>
              </select>
            </th>
          </tr>
        </thead>
      </table>


      
      <table>
        <tr>
 <td style="width:10px;"></td>
    <td>   <input type="text" class="form-control" id="myInput1" onkeyup="search()" placeholder="Search for Product Name.."></td>
    <td style="width:10px;"></td>
   <td> <input type="text" class="form-control" id="myInput2" onkeyup="search()" placeholder="Search for Product Model.."></td>
     <td style="width:10px;"></td>
   <td>  <input type="text" class="form-control" id="myInput3" onkeyup="search()" placeholder="Search for Category.."></td>
     <td style="width:10px;"></td>
   <td> <input type="text" class="form-control" id="myInput4" onkeyup="search()" placeholder="Search for Unit.."></td>
     <td style="width:10px;"></td>
    <td> <input type="text" class="form-control" id="myInput5" onkeyup="search()" placeholder="Search for Orgin.."></td>
      <td style="width:10px;"></td>
   <td>  <input type="text" class="form-control" id="myInput6" onkeyup="search()" placeholder="Search for Account Category.."></td>
     <td style="width:10px;"></td>
   <td> <input type="text" class="form-control" id="myInput7" onkeyup="search()" placeholder="Search for Account Sub Category.."></td>
     <td style="width:10px;"></td>
  <td>  <input type="text" class="form-control" id="myInput8" onkeyup="search()" placeholder="Search for Product Sub Category.."></td>
     <td style="width:10px;"></td>
</tr>
</table>
<br/>
<div class="col-sm-12">
 
<input id="search" type="text" class="form-control"  placeholder="Search for Product Details">
<br>
</div>
<br>

</div>
<!-- <div class="row" >
<div id="for_filter_by" class="for_filter_by" style="display: inline;"><label for="filter_by">Filter By&nbsp;&nbsp;
                   </label><select id="filterby" style="border-radius:5px;height:25px;">
                  <option value="1">S.No</option>
<option value="2">Product Name</option>
<option value="3">Product Model</option>
<option value="4">Inventry</option>
<option value="5">Category</option>
<option value="6">Unit</option>
<option value="7">Supplier Name</option>
<option value="8">Supplier price</option>
<option value="9">Origin</option>
<option value="10">Account Category</option>
<option value="11">Account Sub Category</option>
<option value="12">Product Sub Category</option>
<option value="13">Price</option>
<option value="14">Account Category Name</option>
<option value="15">Tax</option>
<option value="16">Quantity</option>
<option value="17">Serial No</option>
<option value="18">Country</option>




                  </select> <input id="filterinput" style="border-radius:5px;height:25px;" type="text" ></div>
        </div> -->

<div class="sortableTable__container">
  <div class="sortableTable__discard">
  </div>
             <table class="table table-bordered" cellspacing="0" width="100%" id="ProfarmaInvList">
  <thead class="sortableTable">
      <tr style="background-color: #337ab7;border-color: #2e6da4;" class="sortableTable__header">
      <th class="1 value" data-col="1"data-control-column="1">S.No</th>
        <th class="2 value"data-col="2" data-control-column="2"><?php echo display('product_name') ?></th>
        <th class="3 value"data-col="3" data-control-column="3"><?php echo display('product_model') ?></th>
        <th class="I4 value" data-col="4" data-control-column="4"><?php echo display('Inventry')?></th>
        <th class="5 value"data-col="5" data-control-column="5" ><?php echo display('category') ?></th>
          <th class="6 value" data-col="6"data-control-column="6"><?php echo display('Unit') ?></th>
            <th class="7 value"data-col="7" data-control-column="7"><?php echo display('Vendor') ?></th>
              <th class="8 value" data-col="8"data-control-column="8"><?php echo display('Vendor')." ".display('price') ?></th>
                <th class="9 value "data-col="9" data-control-column="9"><?php echo display('Origin') ?></th>
                  <th class="10 value"data-col="10" data-control-column="10"><?php echo display('Account Category') ?></th>

        <th class="11 value"data-col="11" data-control-column="11"><?php echo display('Account Sub category') ?></th>
             <th class="12 value"data-col="12" data-control-column="12" ><?php echo display('Product Sub Category') ?></th>
                  <th class="13 value"data-col="13" data-control-column="13" style="color:white;"><?php echo display('price') ?></th>
                  <th class="14 value"data-col="14" data-control-column="14"><?php echo display('Account Category Name')?></th>
             <th class="15 value" data-col="15"data-control-column="15" ><?php echo display('tax')?></th>
                  <th class="16 value"data-col="16" data-control-column="16" style="color:white;"><?php echo display('quantity')?></th>
                  <th class="17 value"data-col="17" data-control-column="17" ><?php echo display('Serial No')?></th>
                  <th class="18 value" data-col="18" data-control-column="18" style="color:white;"><?php echo display('country')?></th>
                  
                  <th class="19 text-center Action"  data-col="19" data-resizable-column-id="19" data-column-id="action" data-formatter="commands" style="width: 100Px;" data-sortable="false" ><?php echo display('action')?></th>
      </tr>
    </thead>
                     
     <tbody class="sortableTable__body" id="tab">
                        <?php 
                   //    print_r($products);
                 //   for($i=0;$i<count($products);$i++){ 
                         $i=1;
                         if($products){
                        foreach($products as $product)
                           { 
                              $supplier_price = $this->db->select('*')->from('supplier_product')->where("product_id",$product['product_id'])->get()->result_array();
                                $categry = $this->db->select('*')->from('product_category')->where("category_id",$product['category_id'])->get()->result_array();
                              // echo $sale_count[$j]['product_id'];
                            ;
                          //  echo $product['product_id']."/".$sale_count[$i]['product_id']."<br/>";
                            //    echo "Expense"."<br/>";
                            //    echo ($expense_count[$j]['product_id']);
                            //      echo $products[$i]['product_id']."/".$expense_count[$j]['product_id']."<br/>";?>
                        <tr id="task-<?php echo $i; ?>"
              class="task-list-row" 
              data-task-id="<?php echo $i; ?>"
              data-pname="<?php echo $product['product_name']; ?>"
              data-model="<?php echo $product['product_model']; ?>"
              data-category="<?php echo $product['category_id']; ?>"
               data-unit="<?php echo $product['unit']; ?>"
              data-supplier="<?php echo $product['supplier_name']; ?>">
           
            

                            <td data-col="1" style="text-align:center;" class="1"><?php echo $i; ?></td>
                            <td data-col="2" class="2"><a href="<?php echo base_url().'Cproduct/'; ?>product_view/<?php echo $product['product_id']; ?>"><?php echo $product['product_name']; ?></a></td>
                            <td data-col="3" class="3"><?php echo $product['product_model']; ?></td>
                            <td data-col="4"  class="4"style="text-align: -webkit-center;">
                                <div class="row" style="text-align:center;padding:5px;width:300px;border: 1px solid #d3d3d366;
    margin: -1px;"><div class="col-sm-6" style="font-weight:bold;"><?php echo display('In Stock')?></div><div class="col-sm-6"><?php echo $product['p_quantity']; ?></div></div>
                                <div class="row" style="text-align:center;padding:5px;width:300px;border: 1px solid #d3d3d366;
    margin: -1px;"><div class="col-sm-6" style="font-weight:bold;"><?php echo display('Avaliablity')?></div><div class="col-sm-6">
     <?php  
     $sale_sum=false;
     $s=0;
     $e=0;
     $ex_sum=false;
     $total=0;
      if(!empty($sale_count)){
   foreach($sale_count as $sale)
                           {
     if($product['product_id']==$sale['product_id'])
     { 
         $avail=$product['p_quantity']-$sale['available'];
         $total +=$avail;
       // echo $avail;
       $s=$avail;
        $sale_sum=true;
     }
    }
  } if(!empty($expense_count)){
      foreach($expense_count as $expense)
                           {
     if($product['product_id']==$expense['product_id'])
     { 
         $avail=$product['p_quantity']+$expense['available'];
           $total +=$avail;
              $ex_sum=true;
                 $e=$expense['available'];
    }
    }
  }
  if(!empty($expense_count) && !empty($sale_count)){
    if($ex_sum==true && $sale_sum==true){
$total =$s+$e;
    }
  }
  if($total==0){
    $total=$product['p_quantity'];
      echo $total;
  }else{
  echo $total;
  }
  ?></div></div>

 


                <td data-col="5" class="5"><?php echo $product['category_id']; ?></td>
                       <td data-col="6" class="6"><?php echo $product['unit'];  ?></td>
                         <td data-col="7" class="7"><?php echo $product['supplier_name'];  ?></td>
                           <td data-col="8" class="8"><?php echo $product['supplier_price'];  ?></td>
                             <td data-col="9" class="9"><?php echo $product['country'];  ?></td>
                               <td data-col="10" class="10"><?php echo $product['account_category'];  ?></td>
                                  <td data-col="11" class="11"><?php echo $product['sub_category'];  ?></td>
                                    <td data-col="12" class="12"><?php echo $product['product_sub_category'];  ?></td>

                            <td data-col="13" class="13"><?php  echo $product['price']; ?></td>
                            <td data-col="14" class="14"><?php echo $product['account_category_name'];  ?></td>
                                  <td data-col="15" class="15"><?php echo $product['tax'];  ?></td>
                                    <td data-col="16" class="16"> <?php echo $product['p_quantity'];  ?></td>
                                    <td data-col="17" class="17"><?php  echo $product['serial_no']; ?></td>
                            <td data-col="18" class="18"><?php echo $product['country'];  ?></td>
                                  
                       
                


          



<?php    foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='product' && $_SESSION['u_type'] ==3 && trim($split[1])=='0010'){
      
      
       ?>

<td data-col="19" class="19 text-center Action"><a class="btnclr btn  btn-sm" style="background-color: #3CA5DE; color: #fff;" href="<?php echo base_url()?>Cproduct/product_update_form/<?php  echo  $product['product_id'];  ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                    
                    <?php break;}} 
                    if($_SESSION['u_type'] ==2){ ?>

<td data-col="19" class="19 text-center Action"><a class="btnclr btn  btn-sm" style="background-color: #3CA5DE; color: #fff;" href="<?php echo base_url()?>Cproduct/product_update_form/<?php  echo  $product['product_id'];  ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
<a class="btnclr btn  btn-sm" style="background-color: #3CA5DE; color: #fff;" href="<?php echo base_url()?>Cproduct/product_delete_form/<?php  echo  $product['product_id'];  ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>

                        <?php  } ?>










                       
                        </tr>
                    <?php $i++; } }?>
</tbody>

                    </table>
                </div></div>
                <input type="hidden" id="total_product" value="<?php echo $total_product;?>" name="">

                 <input type="hidden" id="category_id" value="<?php echo $category_id;?>" name="">
            </div>
        </div>
    </section>
</div>
<input type="hidden" value="Product/Product" id="url"/>
<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>


<iframe id="txtArea1" style="display:none"></iframe>
    <!-- The Modal Column Switch -->
   <div id="myModal_colSwitch" class="modal_colSwitch">
                    <div class="modal-content_colSwitch" style="width:25%;height:40%;">
                          <span class="close_colSwitch">&times;</span>
                          <div class="col-sm-6"><br><br>
                          <div class="form-group row">

                          <input type="checkbox"  data-control-column="1" checked = "checked" class="1"  value="1"/>S.No<br>
                          <input type="checkbox"  data-control-column="2" checked = "checked" class="2"  value="2"/><?php echo display('product_name') ?><br>

    <input type="checkbox"  data-control-column="3" checked = "checked" class="3"  value="3"/><?php echo display('product_model') ?><br>
 
    <input type="checkbox"  data-control-column="4" checked = "checked" class="4"   value="4"/><?php echo display('Inventry')?><br>
  
    <input type="checkbox"  data-control-column="5" checked = "checked" class="5"   value="5"/><?php echo display('category') ?><br>

    <input type="checkbox"  data-control-column="6" checked = "checked" class="6"   value="6"/><?php echo display('Unit') ?><br>
    
    <input type="checkbox"  data-control-column="7" checked = "checked" class="7"  value="7"/><?php echo display('Vendor') ?><br>
 
    <input type="checkbox"  data-control-column="8" checked = "checked" class="8"   value="8"/><?php echo display('Vendor')." ".display('price') ?><br>
  
    <input type="checkbox"  data-control-column="9" checked = "checked" class="9"   value="9"/><?php echo display('Origin') ?><br>
</div>
</div>

<div class="col-sm-6">
                          <div class="form-group row">

                          <input type="checkbox"  data-control-column="10" checked = "checked" class="10"   value="10"/><?php echo display('Account Category') ?><br>
     <input type="checkbox"  data-control-column="11" checked = "checked" class="11"   value="11"/><?php echo display('Account Sub category') ?><br>

    <input type="checkbox"  data-control-column="12" checked = "checked" class="12"  value="12"/><?php echo display('Product Sub Category') ?><br>

    <input type="checkbox"  data-control-column="13" checked = "checked" class="13"   value="13"/><?php echo display('price') ?><br>

    <input type="checkbox"  data-control-column="14"  class="14"   value="14"/><?php echo display('Account Category Name')?><br>

<input type="checkbox"  data-control-column="15"  class="15"   value="15"/><?php echo display('tax')?><br>
 <input type="checkbox"  data-control-column="16"  class="16 "   value="16 "/><?php echo display('quantity')?> <br>

<input type="checkbox"  data-control-column="17" class="17"  value="17"/><?php echo display('Serial No')?><br>

<input type="checkbox"  data-control-column="18"  class="18"   value="18"/><?php echo display('country')?><br>
       <input type="checkbox"  data-control-column="19" checked = "checked" class="19"   value="19"/><?php echo display('action')?><br> 
</div>
</div>
                          

  

                    </div>
                </div>
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>
<script>
    function pdf() {
  $(".myButtonClass").hide();
  var doc = new jsPDF("p", "pt");
  var res = doc.autoTableHtmlToJson(document.getElementById("ProfarmaInvList"));
  var height = doc.internal.pageSize.height;
  //doc.text("Generated PDF", 50, 50);

  doc.autoTable(res.columns, res.data, {

    // margin: { horizontal: 0 },
      
        styles: { overflow: 'linebreak', cellWidth: 'wrap' },
         horizontalPageBreak: true,
      horizontalPageBreakRepeat: 1,
    startY: doc.autoTableEndPosY() + 50,
  });
  doc.save("Generated PDF.pdf");
}


    $(document).ready(function(){
 $('#search_area').hide();
    });
     $('#s_icon').click(function(){
           $('#search_area').toggle();
         });

var
  filters = {
    user: null,
    status: null,
    milestone: null,
    priority: null,
    tags: null
  };

function updateFilters() {
  $('.task-list-row').hide().filter(function() {
    var
      self = $(this),
      result = true; // not guilty until proven guilty
    
    Object.keys(filters).forEach(function (filter) {
      if (filters[filter] && (filters[filter] != 'None') && (filters[filter] != 'Any')) {
        result = result && filters[filter] == self.data(filter);
      
      }
    });

    return result;
  }).show();
}

function changeFilter(filterName) {
  filters[filterName] = this.value;
  updateFilters();
}
      
// Assigned User Dropdown Filter
$('#pname-filter').on('change', function() {
  changeFilter.call(this, 'pname');
});

// Task Status Dropdown Filter
$('#model-filter').on('change', function() {
  changeFilter.call(this, 'model');
});

// Task Milestone Dropdown Filter
$('#category-filter').on('change', function() {
  changeFilter.call(this, 'category');
});

// Task Priority Dropdown Filter
$('#unit-filter').on('change', function() {
  changeFilter.call(this, 'unit');
});

// Task Tags Dropdown Filter
$('#supplier-filter').on('change', function() {
  changeFilter.call(this, 'supplier');
});

/*
future use for a text input filter
$('#search').on('click', function() {
    $('.box').hide().filter(function() {
        return $(this).data('order-number') == $('#search-criteria').val().trim();
    }).show();
});*/
$("#search").on("keyup", function() {
  var value = $(this).val().toLowerCase();
    $("#ProfarmaInvList tr:not(:eq(0))").filter(function() {
 
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
  });
});



function search() {
    var input_pname,
        input_model,
         input_category,
         input_unit,
        input_orgin,
         input_ac,
          input_asc,
         input_psc,
          
        filter_pname,filter_model,filter_category,filter_unit,filter_orgin,filter_ac,filter_asc,filter_psc,
        table,
        tr,
        td,
        i,
        name,
        country;
    input_pname = document.getElementById("myInput1");
    input_model = document.getElementById("myInput2");
     input_category = document.getElementById("myInput3");
      input_unit = document.getElementById("myInput4");
       input_orgin = document.getElementById("myInput5");
     input_ac = document.getElementById("myInput6");
      input_asc = document.getElementById("myInput7");
        input_psc = document.getElementById("myInput8");
        

    filter_pname = input_pname.value.toUpperCase();    filter_orgin = input_orgin.value.toUpperCase();
    filter_model = input_model.value.toUpperCase();    filter_ac = input_ac.value.toUpperCase();
     filter_category = input_category.value.toUpperCase();    filter_asc = input_asc.value.toUpperCase();
      filter_unit = input_unit.value.toUpperCase();    filter_psc = input_psc.value.toUpperCase();

    table = document.getElementById("ProfarmaInvList");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        td1 = tr[i].getElementsByTagName("td")[2];
         td2 = tr[i].getElementsByTagName("td")[4];
          td3 = tr[i].getElementsByTagName("td")[5];
            td4 = tr[i].getElementsByTagName("td")[8];
        td5 = tr[i].getElementsByTagName("td")[9];
         td6 = tr[i].getElementsByTagName("td")[10];
          td7 = tr[i].getElementsByTagName("td")[11];
        if (td && td1 && td2 && td3 && td4 && td5 && td6 && td7) {
            name = (td.textContent || td.innerText).toUpperCase();
            model = (td1.textContent || td1.innerText).toUpperCase();
              category = (td2.textContent || td2.innerText).toUpperCase();
            unit = (td3.textContent || td3.innerText).toUpperCase();
  origin = (td4.textContent || td4.innerText).toUpperCase();
              ac = (td5.textContent || td5.innerText).toUpperCase();
            asc = (td6.textContent || td6.innerText).toUpperCase();
             psc = (td7.textContent || td7.innerText).toUpperCase();

            if (
                name.indexOf(filter_pname) > -1 &&
                model.indexOf(filter_model) > -1 &&
                category.indexOf(filter_category) > -1 &&
                unit.indexOf(filter_unit) > -1   &&
                origin.indexOf(filter_orgin) > -1   &&
                ac.indexOf(filter_ac) > -1  &&
                asc.indexOf(filter_asc) > -1 &&
                psc.indexOf(filter_psc) > -1

            ) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
    var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
$editor = $('#submit'),
  $editor.on('click', function(e) {
    if (this.checkValidity && !this.checkValidity()) return;
    e.preventDefault();
    var yourArray = [];
    //loop through all checkboxes which is checked
    $('.modal-content_colSwitch input[type=checkbox]:not(:checked)').each(function() {
      yourArray.push($(this).val());//push value in array
    });
   
    values = {
    
      extralist_text: yourArray
    
    };
    console.log(values)
    var json=values;
    var data = {
        page:$('#url').val(),
          content: yourArray
       
       };
       data[csrfName] = csrfHash;
$.ajax({
    
    type: "POST",  
    url:'<?php echo base_url();?>Cinvoice/setting',
   
    data: data,
    dataType: "json", 
    success: function(data) {
        if(data) {
           console.log(data);
        }
    }  
});
  });

  $( document ).ready(function() {
   var page=$('#url').val();
   page=page.split('/');
    var data = {
        'menu':page[0],
        'submenu':page[1]
         
       
       };
      
       data[csrfName] = csrfHash;
    $.ajax({
    
    type: "POST",  
    url:'<?php echo base_url();?>Cinvoice/get_setting',
   
    data: data,
    dataType: "json", 
    success: function(data) {
     var menu=data.menu;
     var submenu=data.submenu;
     if(menu=='Product' && submenu=='Product'){
     var s=data.setting;
s=JSON.parse(s);
console.log(s);
for (var i = 0; i < s.length; i++) {
    console.log(s[i]);
    $('td.'+s[i]).hide(); // hide the column header th
    $('th.'+s[i]).hide();
$('tr').each(function(){
     $(this).find('td:eq('+$('td.'+s[i]).index()+')').hide();
});
    }
    for (var i = 0; i < s.length; i++) {
        if( $('.'+s[i]))
  $('.'+s[i]).prop('checked', false); //check the box from the array, note: you need to add a class to your checkbox group to only select the checkboxes, right now it selects all input elements that have the values in the array 
    }  
}
    }
});


});

function fnExcelReport()
{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('ProfarmaInvList'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}
$("input:checkbox:not(:checked)").each(function() {
    var column = "table ." + $(this).attr("value");
    $(column).hide();
});

$("input:checkbox").click(function(){
    var column = "table ." + $(this).attr("value");
    $(column).toggle();
});
    </script>
    <script>
 $(document).on('keyup', '#filterinput', function(){
 
    var value = $(this).val().toLowerCase();
    var filter=$("#filterby").val();
    $("#ProfarmaInvList tr:not(:eq(0))").filter(function() {
        $(this).toggle($(this).find("td."+filter).text().toLowerCase().indexOf(value) > -1)
    });
});
</script>