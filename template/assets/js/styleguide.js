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
    /**
     * Gestionnaire de la nav
     */
    navMainHandler: function () {
        var self = this;
        self.elements.navMainLinks = self.elements.navMain.querySelectorAll('a');

        if (self.elements.navMainLinks.length) {
            self.elements.navMainLinks.forEach(function (link, i) {
                link.addEventListener('click', function () {
                    if (self.elements.body.classList.contains('is-firstLoad')) {
                        self.elements.body.classList.remove('is-firstLoad');
                    }
                });
            });

            self.elements.body.classList.add('is-firstLoad');
        }
    },

    /**
     * Gestionnaire du markup
     */
    markupHandler: function () {
        var self = this;

        self.elements.markup.forEach(function (item, i) {
            // Close
            item.classList.remove('is-open');

            // Event
            item.querySelector('button').addEventListener('click', function () {
                this.parentNode.classList.toggle('is-open');
            })
        });
    },

    /**
     * Gestionnaire de scroll
     */
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

    /**
     * Ajoute l'état "actif" sur l'item de navigation correspondant
     */
    setNavItemActive: function () {
        var self = this;
        var pageY = window.scrollY;
        var timeout;

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