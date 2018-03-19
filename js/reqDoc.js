var category = document.getElementById('category');
var sub_cat = document.getElementById('sub_cat');
var field_b = document.getElementById('field_b');

function selectValue() {
    if (category.value == 'PP') {
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('block').style.visibility = 'hidden';
        document.getElementById('sub_cat_label').style.visibility = 'hidden';
        document.getElementById('sub_cat').style.visibility = 'hidden';
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sheet_dropdown').style.visibility = 'hidden';
        document.getElementById('court').style.visibility = 'hidden';
        document.getElementById('field_book').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'visible';
    } else if (category.value == 'Topo. PP') {
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('block').style.visibility = 'hidden';
        document.getElementById('sub_cat_label').style.visibility = 'visible';
        document.getElementById('sub_cat').style.visibility = 'visible';
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sheet_dropdown').style.visibility = 'hidden';
        document.getElementById('court').style.visibility = 'hidden';
        document.getElementById('field_book').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == 'FTP') {
        document.getElementById('sup').style.visibility = 'visible';
        document.getElementById('insert').style.visibility = 'visible';
        document.getElementById('sheet').style.visibility = 'visible';
        document.getElementById('block').style.visibility = 'hidden';
        document.getElementById('sub_cat_label').style.visibility = 'visible';
        document.getElementById('sub_cat').style.visibility = 'visible';
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sheet_dropdown').style.visibility = 'hidden';
        document.getElementById('court').style.visibility = 'hidden';
        document.getElementById('field_book').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == 'VP') {
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('block').style.visibility = 'hidden';
        document.getElementById('sub_cat_label').style.visibility = 'visible';
        document.getElementById('sub_cat').style.visibility = 'visible';
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sheet_dropdown').style.visibility = 'visible';
        document.getElementById('court').style.visibility = 'hidden';
        document.getElementById('field_book').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == 'FVP') {
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('block').style.visibility = 'hidden';
        document.getElementById('sub_cat_label').style.visibility = 'visible';
        document.getElementById('sub_cat').style.visibility = 'visible';
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sheet_dropdown').style.visibility = 'visible';
        document.getElementById('court').style.visibility = 'hidden';
        document.getElementById('field_book').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == 'CP') {
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('block').style.visibility = 'hidden';
        document.getElementById('sub_cat_label').style.visibility = 'visible';
        document.getElementById('sub_cat').style.visibility = 'visible';
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sheet_dropdown').style.visibility = 'hidden';
        document.getElementById('court').style.visibility = 'hidden';
        document.getElementById('field_book').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == 'FCP') {
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('block').style.visibility = 'hidden';
        document.getElementById('sub_cat_label').style.visibility = 'visible';
        document.getElementById('sub_cat').style.visibility = 'visible';
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sheet_dropdown').style.visibility = 'hidden';
        document.getElementById('court').style.visibility = 'hidden';
        document.getElementById('field_book').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == 'FSP') {
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'visible';
        document.getElementById('block').style.visibility = 'hidden';
        document.getElementById('sub_cat_label').style.visibility = 'hidden';
        document.getElementById('sub_cat').style.visibility = 'hidden';
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sheet_dropdown').style.visibility = 'hidden';
        document.getElementById('court').style.visibility = 'hidden';
        document.getElementById('field_book').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == 'FSPP') {
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('block').style.visibility = 'hidden';
        document.getElementById('sub_cat_label').style.visibility = 'visible';
        document.getElementById('sub_cat').style.visibility = 'visible';
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sheet_dropdown').style.visibility = 'visible';
        document.getElementById('court').style.visibility = 'hidden';
        document.getElementById('field_book').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == 'ISPP') {
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('block').style.visibility = 'hidden';
        document.getElementById('sub_cat_label').style.visibility = 'visible';
        document.getElementById('sub_cat').style.visibility = 'visible';
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sheet_dropdown').style.visibility = 'visible';
        document.getElementById('court').style.visibility = 'hidden';
        document.getElementById('field_book').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == 'FUP') {
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('block').style.visibility = 'hidden';
        document.getElementById('sub_cat_label').style.visibility = 'visible';
        document.getElementById('sub_cat').style.visibility = 'visible';
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sheet_dropdown').style.visibility = 'visible';
        document.getElementById('court').style.visibility = 'hidden';
        document.getElementById('field_book').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == 'TRC') {
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('block').style.visibility = 'hidden';
        document.getElementById('sub_cat_label').style.visibility = 'visible';
        document.getElementById('sub_cat').style.visibility = 'visible';
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sheet_dropdown').style.visibility = 'visible';
        document.getElementById('court').style.visibility = 'hidden';
        document.getElementById('field_book').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == 'TP') {
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('block').style.visibility = 'hidden';
        document.getElementById('sub_cat_label').style.visibility = 'hidden';
        document.getElementById('sub_cat').style.visibility = 'hidden';
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sheet_dropdown').style.visibility = 'hidden';
        document.getElementById('court').style.visibility = 'hidden';
        document.getElementById('field_book').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == 'CTP') {
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('block').style.visibility = 'hidden';
        document.getElementById('sub_cat_label').style.visibility = 'hidden';
        document.getElementById('sub_cat').style.visibility = 'hidden';
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sheet_dropdown').style.visibility = 'hidden';
        document.getElementById('court').style.visibility = 'hidden';
        document.getElementById('field_book').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == 'TTP') {
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('block').style.visibility = 'hidden';
        document.getElementById('sub_cat_label').style.visibility = 'hidden';
        document.getElementById('sub_cat').style.visibility = 'hidden';
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sheet_dropdown').style.visibility = 'hidden';
        document.getElementById('court').style.visibility = 'hidden';
        document.getElementById('field_book').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == 'TWNP') {
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('block').style.visibility = 'hidden';
        document.getElementById('sub_cat_label').style.visibility = 'hidden';
        document.getElementById('sub_cat').style.visibility = 'hidden';
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sheet_dropdown').style.visibility = 'hidden';
        document.getElementById('court').style.visibility = 'hidden';
        document.getElementById('field_book').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == 'TSP') {
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('block').style.visibility = 'hidden';
        document.getElementById('sub_cat_label').style.visibility = 'visible';
        document.getElementById('sub_cat').style.visibility = 'visible';
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sheet_dropdown').style.visibility = 'visible';
        document.getElementById('court').style.visibility = 'hidden';
        document.getElementById('field_book').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == 'TSPP') {
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('block').style.visibility = 'hidden';
        document.getElementById('sub_cat_label').style.visibility = 'visible';
        document.getElementById('sub_cat').style.visibility = 'visible';
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sheet_dropdown').style.visibility = 'visible';
        document.getElementById('court').style.visibility = 'hidden';
        document.getElementById('field_book').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == 'MSPP') {
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('block').style.visibility = 'hidden';
        document.getElementById('sub_cat_label').style.visibility = 'visible';
        document.getElementById('sub_cat').style.visibility = 'visible';
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sheet_dropdown').style.visibility = 'visible';
        document.getElementById('court').style.visibility = 'hidden';
        document.getElementById('field_book').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == 'Condo_Plan') {
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('block').style.visibility = 'hidden';
        document.getElementById('sub_cat_label').style.visibility = 'hidden';
        document.getElementById('sub_cat').style.visibility = 'hidden';
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sheet_dropdown').style.visibility = 'hidden';
        document.getElementById('court').style.visibility = 'hidden';
        document.getElementById('field_book').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == 'CM') {
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('block').style.visibility = 'hidden';
        document.getElementById('sub_cat_label').style.visibility = 'visible';
        document.getElementById('sub_cat').style.visibility = 'visible';
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('flatcopy').style.visibility = 'hidden';
        document.getElementById('tl').style.visibility = 'hidden';
        document.getElementById('sup_sheet').style.visibility = 'hidden';
        document.getElementById('fullcopy').style.visibility = 'visible';
        document.getElementById('sheet_dropdown').style.visibility = 'visible';
        document.getElementById('court').style.visibility = 'hidden';
        document.getElementById('field_book').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == 'BSVP') {
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'visible';
        document.getElementById('block').style.visibility = 'hidden';
        document.getElementById('sub_cat_label').style.visibility = 'hidden';
        document.getElementById('sub_cat').style.visibility = 'hidden';
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sheet_dropdown').style.visibility = 'hidden';
        document.getElementById('court').style.visibility = 'hidden';
        document.getElementById('field_book').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == 'BSPP') {
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'visible';
        document.getElementById('block').style.visibility = 'hidden';
        document.getElementById('sub_cat_label').style.visibility = 'hidden';
        document.getElementById('sub_cat').style.visibility = 'hidden';
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sheet_dropdown').style.visibility = 'hidden';
        document.getElementById('court').style.visibility = 'hidden';
        document.getElementById('field_book').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == 'CLP') {
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('block').style.visibility = 'hidden';
        document.getElementById('sub_cat_label').style.visibility = 'hidden';
        document.getElementById('sub_cat').style.visibility = 'hidden';
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sheet_dropdown').style.visibility = 'hidden';
        document.getElementById('court').style.visibility = 'hidden';
        document.getElementById('field_book').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == 'UP') {
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('block').style.visibility = 'hidden';
        document.getElementById('sub_cat_label').style.visibility = 'hidden';
        document.getElementById('sub_cat').style.visibility = 'hidden';
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sheet_dropdown').style.visibility = 'hidden';
        document.getElementById('court').style.visibility = 'hidden';
        document.getElementById('field_book').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == 'Standard sheet') {
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('block').style.visibility = 'hidden';
        document.getElementById('sub_cat_label').style.visibility = 'hidden';
        document.getElementById('sub_cat').style.visibility = 'hidden';
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sheet_dropdown').style.visibility = 'hidden';
        document.getElementById('court').style.visibility = 'hidden';
        document.getElementById('field_book').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == 'Field book') {
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('block').style.visibility = 'hidden';
        document.getElementById('sub_cat_label').style.visibility = 'hidden';
        document.getElementById('sub_cat').style.visibility = 'hidden';
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('court').style.visibility = 'hidden';
        document.getElementById('field_book').style.visibility = 'visible';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == '8 chain sheet') {
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('block').style.visibility = 'hidden';
        document.getElementById('sub_cat_label').style.visibility = 'hidden';
        document.getElementById('sub_cat').style.visibility = 'hidden';
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('court').style.visibility = 'hidden';
        document.getElementById('field_book').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == '16 chain RD sheet') {
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('block').style.visibility = 'hidden';
        document.getElementById('sub_cat_label').style.visibility = 'visible';
        document.getElementById('sub_cat').style.visibility = 'visible';
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup_sheet').style.visibility = 'hidden';
        document.getElementById('flatcopy').style.visibility = 'hidden';
        document.getElementById('tl').style.visibility = 'hidden';
        document.getElementById('fullcopy').style.visibility = 'hidden';
        document.getElementById('sheet_dropdown').style.visibility = 'visible';
        document.getElementById('court').style.visibility = 'hidden';
        document.getElementById('field_book').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == 'Requisition file') {
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('block').style.visibility = 'hidden';
        document.getElementById('sub_cat_label').style.visibility = 'hidden';
        document.getElementById('sub_cat').style.visibility = 'hidden';
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('court').style.visibility = 'hidden';
        document.getElementById('field_book').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == 'Court file') {
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('block').style.visibility = 'hidden';
        document.getElementById('sub_cat_label').style.visibility = 'hidden';
        document.getElementById('sub_cat').style.visibility = 'hidden';
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('court').style.visibility = 'visible';
        document.getElementById('field_book').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == '1: 50000 sheet') {
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('block').style.visibility = 'hidden';
        document.getElementById('sub_cat_label').style.visibility = 'hidden';
        document.getElementById('sub_cat').style.visibility = 'hidden';
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('court').style.visibility = 'hidden';
        document.getElementById('field_book').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }

    if (category.value == 'Topo. PP' && sub_cat.value == 'Flat Copy') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == 'Topo. PP' && sub_cat.value == 'TL') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'visible';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == 'Topo. PP' && sub_cat.value == 'Full Copy') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'visible';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == 'Topo. PP' && sub_cat.value == 'Sup Sheet') {
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'visible';
        document.getElementById('insert').style.visibility = 'visible';
        document.getElementById('sheet').style.visibility = 'visible';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == 'FTP' && sub_cat.value == 'Flat Copy') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == 'FTP' && sub_cat.value == 'TL') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'visible';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == 'FTP' && sub_cat.value == 'Full Copy') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'visible';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == 'FTP' && sub_cat.value == 'Sup Sheet') {
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'visible';
        document.getElementById('insert').style.visibility = 'visible';
        document.getElementById('sheet').style.visibility = 'visible';
        document.getElementById('dist').style.visibility = 'hidden';
    } else if (category.value == 'VP' && sub_cat.value == 'Flat Copy') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'VP' && sub_cat.value == 'TL') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'visible';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'VP' && sub_cat.value == 'Full Copy') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'visible';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'VP' && sub_cat.value == 'Sup Sheet') {
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'visible';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'visible';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'VP' && sub_cat.value == 'Sheet') {
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'visible';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'FVP' && sub_cat.value == 'Flat Copy') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'FVP' && sub_cat.value == 'TL') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'visible';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'FVP' && sub_cat.value == 'Full Copy') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'visible';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'FVP' && sub_cat.value == 'Sup Sheet') {
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'visible';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'visible';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'FVP' && sub_cat.value == 'Sheet') {
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'visible';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'CP' && sub_cat.value == 'Flat Copy') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'CP' && sub_cat.value == 'TL') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'visible';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'CP' && sub_cat.value == 'Full Copy') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'visible';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'CP' && sub_cat.value == 'Sup Sheet') {
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'visible';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'visible';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'CP' && sub_cat.value == 'Sheet') {
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'FCP' && sub_cat.value == 'Flat Copy') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'FCP' && sub_cat.value == 'TL') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'visible';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'FCP' && sub_cat.value == 'Full Copy') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'visible';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'FCP' && sub_cat.value == 'Sup Sheet') {
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'visible';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'visible';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'FCP' && sub_cat.value == 'Sheet') {
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'FSPP' && sub_cat.value == 'Flat Copy') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'FSPP' && sub_cat.value == 'TL') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'visible';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'FSPP' && sub_cat.value == 'Full Copy') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'visible';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'FSPP' && sub_cat.value == 'Sup Sheet') {
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'visible';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'visible';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'FSPP' && sub_cat.value == 'Sheet') {
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'visible';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'ISPP' && sub_cat.value == 'Flat Copy') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'ISPP' && sub_cat.value == 'TL') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'visible';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'ISPP' && sub_cat.value == 'Full Copy') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'visible';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'ISPP' && sub_cat.value == 'Sup Sheet') {
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'visible';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'visible';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'ISPP' && sub_cat.value == 'Sheet') {
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'visible';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'FUP' && sub_cat.value == 'Flat Copy') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'FUP' && sub_cat.value == 'TL') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'visible';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'FUP' && sub_cat.value == 'Full Copy') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'visible';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'FUP' && sub_cat.value == 'Sup Sheet') {
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'visible';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'visible';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'FUP' && sub_cat.value == 'Sheet') {
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'visible';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'TRC' && sub_cat.value == 'Flat Copy') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'TRC' && sub_cat.value == 'TL') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'visible';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'TRC' && sub_cat.value == 'Full Copy') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'visible';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'TRC' && sub_cat.value == 'Sup Sheet') {
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'visible';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'visible';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'TRC' && sub_cat.value == 'Sheet') {
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'visible';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'TSP' && sub_cat.value == 'Flat Copy') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'TSP' && sub_cat.value == 'TL') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'visible';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'TSP' && sub_cat.value == 'Full Copy') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'visible';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'TSP' && sub_cat.value == 'Sup Sheet') {
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'visible';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'visible';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'TSP' && sub_cat.value == 'Sheet') {
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'visible';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'TSPP' && sub_cat.value == 'Flat Copy') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'TSPP' && sub_cat.value == 'TL') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'visible';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'TSPP' && sub_cat.value == 'Full Copy') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'visible';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'TSPP' && sub_cat.value == 'Sup Sheet') {
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'visible';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'visible';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'TSPP' && sub_cat.value == 'Sheet') {
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'visible';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'MSPP' && sub_cat.value == 'Flat Copy') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'MSPP' && sub_cat.value == 'TL') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'visible';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'MSPP' && sub_cat.value == 'Full Copy') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'visible';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'MSPP' && sub_cat.value == 'Sup Sheet') {
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'visible';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'visible';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'MSPP' && sub_cat.value == 'Sheet') {
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'visible';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'CM' && sub_cat.value == 'Flat Copy') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'CM' && sub_cat.value == 'TL') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'visible';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'CM' && sub_cat.value == 'Full Copy') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'visible';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'CM' && sub_cat.value == 'Sup Sheet') {
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'visible';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'visible';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'CM' && sub_cat.value == 'Sheet') {
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'visible';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == '16 chain RD sheet' && sub_cat.value == 'Flat Copy') {
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == '16 chain RD sheet' && sub_cat.value == 'TL') {
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == '16 chain RD sheet' && sub_cat.value == 'Full Copy') {
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == '16 chain RD sheet' && sub_cat.value == 'Sup Sheet') {
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == '16 chain RD sheet' && sub_cat.value == 'Sheet') {
        document.getElementById('fc').style.visibility = 'visible';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
        document.getElementById('dist').style.visibility = 'hidden';
    }else if (category.value == 'Field book' && (field_b.value == 'Metric book' || field_b.value == 'EDM book')) {
        document.getElementById('dist').style.visibility = 'visible';
        document.getElementById('fc').style.visibility = 'hidden';
        document.getElementById('vol').style.visibility = 'hidden';
        document.getElementById('sup').style.visibility = 'hidden';
        document.getElementById('insert').style.visibility = 'hidden';
        document.getElementById('sheet').style.visibility = 'hidden';
    }
}


