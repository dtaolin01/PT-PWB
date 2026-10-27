document.addEventListener('DOMContentLoaded', function () {
    var el = document.getElementById('pwb-trk-map');
    if (!el || typeof L === 'undefined') return;

    var data = {};
    try {
        data = JSON.parse(el.getAttribute('data-map')) || {};
    } catch (e) {
        data = {};
    }

    var map = L.map(el, { scrollWheelZoom: false });

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    // Zoom dengan scroll hanya aktif setelah peta diklik
    map.on('click', function () { map.scrollWheelZoom.enable(); });
    map.on('mouseout', function () { map.scrollWheelZoom.disable(); });

    function toPoint(item) {
        var lat = parseFloat(item && item.lat);
        var lng = parseFloat(item && item.lng);
        return (isNaN(lat) || isNaN(lng)) ? null : [lat, lng];
    }

    function makeIcon(cls, inner, size) {
        return L.divIcon({
            className: 'pwb-trk-marker-wrap',
            html: '<div class="pwb-trk-marker ' + cls + '">' + inner + '</div>',
            iconSize: [size, size],
            iconAnchor: [size / 2, size / 2],
            popupAnchor: [0, -size / 2]
        });
    }

    function makePopup(title, lines) {
        var box = document.createElement('div');
        var strong = document.createElement('strong');
        strong.textContent = title || '';
        box.appendChild(strong);

        (lines || []).forEach(function (text) {
            if (!text) return;
            var row = document.createElement('div');
            row.textContent = text;
            box.appendChild(row);
        });
        return box;
    }

    var bounds = [];
    var routePoints = [];
    var pinLabels = { origin: 'A', destination: 'B', stop: '&bull;' };

    // Pin pengiriman
    (data.pins || []).forEach(function (pin) {
        var point = toPoint(pin);
        if (!point) return;

        var type = pinLabels[pin.type] ? pin.type : 'stop';

        L.marker(point, { icon: makeIcon('pwb-trk-marker--' + type, pinLabels[type], 32) })
            .addTo(map)
            .bindPopup(makePopup(pin.name, [pin.note]));

        bounds.push(point);
        routePoints.push(point);
    });

    // Garis rute: mengikuti jalan jika tersedia, jika tidak garis lurus putus-putus
    var hasRoadRoute = Array.isArray(data.route) && data.route.length > 1;

    if (hasRoadRoute) {
        // Garis putih di bawah sebagai tepi, supaya rute terlihat jelas di atas peta
        L.polyline(data.route, { color: '#ffffff', weight: 9, opacity: 0.9, lineJoin: 'round' }).addTo(map);
        L.polyline(data.route, { color: '#1553b5', weight: 5, opacity: 0.95, lineJoin: 'round' }).addTo(map);
    } else if (routePoints.length > 1) {
        L.polyline(routePoints, {
            color: '#1553b5',
            weight: 3,
            opacity: 0.7,
            dashArray: '8 8'
        }).addTo(map);
    }

    // Lokasi unit truk
    (data.trucks || []).forEach(function (truck) {
        var point = toPoint(truck);
        if (!point) return;

        var inner = truck.icon
            ? '<img src="' + String(truck.icon).replace(/"/g, '&quot;') + '" alt="">'
            : '&#128666;';

        L.marker(point, { icon: makeIcon('pwb-trk-marker--truck', inner, 44), zIndexOffset: 1000 })
            .addTo(map)
            .bindPopup(makePopup(truck.name, [truck.updated_at ? 'Diperbarui: ' + truck.updated_at : '']));

        bounds.push(point);
    });

    // Sesuaikan tampilan peta agar semua titik dan rute terlihat
    var fitPoints = bounds.slice();
    if (hasRoadRoute) {
        fitPoints = fitPoints.concat(data.route);
    }

    if (fitPoints.length > 1) {
        map.fitBounds(L.latLngBounds(fitPoints), { padding: [50, 50], maxZoom: 15 });
    } else if (fitPoints.length === 1) {
        map.setView(fitPoints[0], 13);
    } else {
        map.setView([-2.5, 118], 5);
    }

    setTimeout(function () { map.invalidateSize(); }, 200);
});
