var Styleguide = function () {
    this.elements = {
        body: document.querySelector('body'),
        navMain: document.querySelector('#nav-main'),
        markup: document.querySelectorAll('.styleguide__html'),
        category: document.querySelectorAll('.styleguide-anchor')
    };

    if (this.elements.navMain !== null) {
        this.navMainHandler();
    }
    if (this.elements.markup !== null) {
        this.markupHandler();
    }
    if (this.elements.category !== null) {
        this.scrollHandler();
    }
};

Styleguide.prototype = {
    navMainHandler: function () {
        var self = this;
        self.elements.navMainLinks = self.elements.navMain.querySelectorAll('a');

        if (self.elements.navMainLinks.length) {
            self.elements.navMainLinks.forEach(function (link) {
                link.addEventListener('click', function () {
                    if (self.elements.body.classList.contains('is-firstLoad')) {
                        self.elements.body.classList.remove('is-firstLoad');
                    }
                });
            });

            self.elements.body.classList.add('is-firstLoad');
        }
    },
    markupHandler: function () {
        var self = this;

        self.elements.markup.forEach(function (item) {
            // Close
            item.classList.remove('is-open');

            // Event
            item.querySelector('button').addEventListener('click', function () {
                this.parentNode.classList.toggle('is-open');
            })
        });
    },
    scrollHandler: function () {
        var self = this;
        this.lastScrollY = 0;

        // Get top offsets
        self.offsets = [];
        self.elements.category.forEach(function (item) {
            var offset = item.getBoundingClientRect();

            self.offsets.push({
                category: item.nextElementSibling.innerText,
                offsetY: item.offsetTop
            });
        });

        // Event
        self.setNavItemActive();
        document.addEventListener('scroll', function () {
            self.setNavItemActive();
        });
    },
    setNavItemActive: function () {
        var self = this;
        var pageY = window.scrollY;

        if (pageY === 0) {
            pageY = 80
        }

        self.offsets.forEach(function (item) {
            if (pageY >= item.offsetY) {
                self.elements.navMainLinks.forEach(function (link) {
                    link.classList[(link.getAttribute('href') === '#' + item.category) ? 'add' : 'remove']('is-active');
                });
            }
        });
    }
};

document.addEventListener('DOMContentLoaded', function () {
    new Styleguide();
});