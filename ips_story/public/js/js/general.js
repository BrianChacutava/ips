function loadTargetImages(){
    $.each($('img'), function (index, value) {
        value = $(value)
        var attr = value.attr('target');
        // For some browsers, `attr` is undefined; for others, `attr` is false. Check for both.
        if (typeof attr !== typeof undefined && attr !== false) {
            // Element has this attribute
            $(value).attr('src', value.attr('target'))
        }
    });
}

const systemcolors = [
    '#ffc107',
    '#00a65a',
    '#f56954',
    '#f39c12',
    '#d2d6de',
    '#3c8dbc',
    '#00c0ef',
    '#d2d6de',
    '#28a745',
    '#17a2b8',
    '#efefef'
]

const classes = [
    'primary',
    'success',
    'warning',
    'danger',
    'info',
    'light',
]

const warningTitleCSS = 'color:red; font-size:60px; font-weight: bold; -webkit-text-stroke: 1px black;';
const warningDescCSS = 'font-size: 18px;';
console.log('%cStop!', warningTitleCSS);
console.log("%cThis is a browser feature intended for developers. If someone told you to copy and paste something here to enable a Mucassa feature or \"hack\" someone's account, it is a scam and will give them access to your Mucassa account.", warningDescCSS);
console.log('%cSee '+window.location.protocol+window.location.hostname+'/security for more information.', warningDescCSS);