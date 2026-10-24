document.addEventListener('DOMContentLoaded', function () {
    var navbar = document.querySelector('.pwb-navbar');
    var toggle = document.getElementById('pwb-toggle');
    var links = document.querySelectorAll('.pwb-menu a[data-section]');

    if (!navbar || !links.length) return;

    // Pasangkan tiap link dengan elemen tujuannya
    var items = [];
    links.forEach(function (link) {
        var id = link.getAttribute('data-section');
        var el = id === 'top' ? document.body : document.getElementById(id);
        if (el) items.push({ link: link, el: el });
    });

    // Tandai menu aktif sesuai posisi scroll
    function updateActive() {
        var offset = navbar.offsetHeight + 40;
        var current = items[0];

        items.forEach(function (item) {
            if (item.el.getBoundingClientRect().top - offset <= 0) {
                current = item;
            }
        });

        items.forEach(function (item) {
            item.link.classList.toggle('active', item === current);
        });
    }

    updateActive();
    window.addEventListener('scroll', updateActive, { passive: true });

    // Tutup menu mobile setelah link diklik
    links.forEach(function (link) {
        link.addEventListener('click', function () {
            if (toggle) toggle.checked = false;
        });
    });
});
