
function formatCurrencyNumber(number,locale = 'pt-PT' ,currency = 'MZN') {
    return new Intl.NumberFormat(locale, {
        style: 'currency',
        currency: currency
    }).format(number)
}

function formatNumber(number,locale = 'pt-PT' ,options = {}) {
    return new Intl.NumberFormat(locale,options).format(number)
}