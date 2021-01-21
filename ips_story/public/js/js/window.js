
function reload() {
    window.location.reload();
}

function goto(url) {
    window.location.assign(url);
}

function openNewTab(url) {
    window.open(url, "_blank");
}

function currentUrl() {
    return window.location.href;
}

window.addEventListener("pageshow", function (event) {
    var historyTraversal = event.persisted ||
        (typeof window.performance != "undefined" &&
            window.performance.navigation.type === 2);
    if (historyTraversal) {
        reload()
    }
});
