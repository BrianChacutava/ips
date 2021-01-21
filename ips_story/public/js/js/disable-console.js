// It appears Netflix is following (Facebook's lead)[https://news.ycombinator.com/item?id=7222129].

(function() {
    try {
        var $_console$$ = console;
        Object.defineProperty(window, "console", {
            get: function() {
                if ($_console$$._commandLineAPI)
                    throw "Sorry, for security reasons, the script console is deactivated on netflix.com";
                return $_console$$
            },
            set: function($val$$) {
                $_console$$ = $val$$
            }
        })
    } catch ($ignore$$) {
    }
})();

// I feel like we're seeing the next generation of engineers pursue ideas that were demonstrated 
// bad by the previous. First, we'll disable right-click, you know, "for security reasons." And by
// that we mean "so you can't steal our source code or save our images to your disk (even though you 
// can still "View Source" in the browser and download the images in a similar way). Now we'll
// disable the console, you know, "for security reasons."

// Note: the NSA stores your phone conversations (and much more), you know, "for security reasons."
// It's an amazing justification that validates any nefarious behavior. Oh, you'd like to destroy
// my freedoms? Why? "For security reasons." Oh, go right ahead then! Thanks so much for looking
// out for me!

// Google should really patch this. The command line API should be privileged so that third
// parties can't modify how the browser behaves without explicit authorization (i.e. an extension).
// But if you're feeling up to it, you can run the following line via an extension to prevent
// this abuse:

// Object.defineProperty(window, 'console', {configurable: false, value: window.console});

// Crockford has the correct idea when it comes to
// (security in web applications)[https://www.youtube.com/watch?v=zKuFu19LgZA&t=27m15s].
// Cookies with session identifiers should be HTTPS only. Local storage and globals should not store
// sensitive data. API requests can be made inaccessible from XSS (and that includes self-XSS) by
// means of a CSRF token that is properly secured (as explained in a roundabout way in the video).
// You should also be using a CSP to prevent the script injection Facebook demonstrated (but I
// don't see a CSP on Netflix.com).

// And interestingly, Chrome (even Canary) still allows the user to run javascript from the omnibar.

// Disabling the console is just stupid.