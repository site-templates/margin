/*
    Margin — the interaction layer.

    Everything here is a progressive enhancement. Without JavaScript nothing
    is hidden and every link works; with it the page gains the tap toggle on
    the Product menu, the phone menu, the header's scrolled state, the scroll
    reveals, the rail chips attaching to their rule, the pricing period
    toggle and the one-open FAQ. Reduced motion resolves every reveal to its
    visible state without animating it.

    setUp(root) owns everything inside <main>. It runs once on load and again
    after every instant navigation for the swapped-in <main>. The header
    binds once — it persists across pages.
*/

document.documentElement.classList.add('js');

var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

var revealObserver = null;
var revealWatched = [];

productMenu();
mobileMenu();
stickyHeader();
setUp(document);

document.addEventListener('instant:navigated', function (event) {
    closeMobileMenu();
    setUp(event.detail.main);
});

function setUp(root) {
    forgetDetachedReveals();

    reveals(root);
    pricing(root);
    singleOpenFaq(root);
}

/* Stop watching reveals whose page has been swapped out. */
function forgetDetachedReveals() {
    if (!revealObserver) {
        return;
    }

    revealWatched = revealWatched.filter(function (el) {
        if (el.isConnected && !el.classList.contains('is-visible')) {
            return true;
        }
        revealObserver.unobserve(el);
        return false;
    });
}

/* The Product menu: hover and focus open it in CSS; a tap toggles it for touch screens. */
function productMenu() {
    var item = document.querySelector('[data-nav-item]');
    var toggle = item && item.querySelector('[data-nav-toggle]');

    if (!toggle) {
        return;
    }

    toggle.addEventListener('click', function () {
        var open = item.toggleAttribute('data-open');
        toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });

    document.addEventListener('click', function (event) {
        if (!item.contains(event.target)) {
            item.removeAttribute('data-open');
            toggle.setAttribute('aria-expanded', 'false');
        }
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && item.hasAttribute('data-open')) {
            item.removeAttribute('data-open');
            toggle.setAttribute('aria-expanded', 'false');
            toggle.focus();
        }
    });
}

function mobileMenu() {
    var header = document.getElementById('header');
    var toggle = header && header.querySelector('[data-menu-toggle]');

    if (!toggle) {
        return;
    }

    toggle.addEventListener('click', function () {
        var open = header.toggleAttribute('data-menu-open');
        toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && header.hasAttribute('data-menu-open')) {
            closeMobileMenu();
            toggle.focus();
        }
    });

    window.matchMedia('(min-width: 64rem)').addEventListener('change', closeMobileMenu);
}

function closeMobileMenu() {
    var header = document.getElementById('header');
    var toggle = header && header.querySelector('[data-menu-toggle]');

    if (header) {
        header.removeAttribute('data-menu-open');
    }

    if (toggle) {
        toggle.setAttribute('aria-expanded', 'false');
    }
}

/*
    The header carries no hairline while the page is at the top, so the hero
    runs straight into it; the moment it scrolls the rule and shadow arrive.
    A sentinel element is cheaper and smoother than a scroll listener.
*/
function stickyHeader() {
    var header = document.getElementById('header');

    if (!header || !('IntersectionObserver' in window)) {
        return;
    }

    var sentinel = document.createElement('div');
    sentinel.setAttribute('aria-hidden', 'true');
    sentinel.style.position = 'absolute';
    sentinel.style.top = '0';
    sentinel.style.height = '1px';
    sentinel.style.width = '1px';
    document.body.prepend(sentinel);

    new IntersectionObserver(function (entries) {
        entries[0].isIntersecting
            ? header.removeAttribute('data-stuck')
            : header.setAttribute('data-stuck', '');
    }).observe(sentinel);
}

/*
    Elements marked data-reveal fade and rise once as they scroll into view.
    Rail items use the same flag — their connector draws and their chip
    settles from the CSS in site.css.
*/
function reveals(root) {
    var targets = Array.prototype.slice.call(root.querySelectorAll('[data-reveal]'));

    if (reduceMotion || !('IntersectionObserver' in window)) {
        targets.forEach(function (el) { el.classList.add('is-visible'); });
        return;
    }

    if (!revealObserver) {
        revealObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { rootMargin: '0px 0px -8% 0px', threshold: 0.1 });
    }

    targets.forEach(function (el) {
        revealObserver.observe(el);
        revealWatched.push(el);
    });
}

/* Both prices are in the markup; the section's data-period decides which shows. */
function pricing(root) {
    root.querySelectorAll('[data-pricing]').forEach(function (section) {
        section.querySelectorAll('[data-period-choice]').forEach(function (button) {
            button.addEventListener('click', function () {
                section.dataset.period = button.dataset.periodChoice;
                section.querySelectorAll('[data-period-choice]').forEach(function (other) {
                    other.setAttribute('aria-pressed', other === button ? 'true' : 'false');
                });
            });
        });
    });
}

/* Opening one question closes its siblings. */
function singleOpenFaq(root) {
    root.querySelectorAll('[data-faq]').forEach(function (list) {
        list.querySelectorAll('details').forEach(function (item) {
            item.addEventListener('toggle', function () {
                if (!item.open) {
                    return;
                }
                list.querySelectorAll('details[open]').forEach(function (other) {
                    if (other !== item) {
                        other.open = false;
                    }
                });
            });
        });
    });
}
