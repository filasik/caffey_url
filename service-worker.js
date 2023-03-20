const CACHE_NAME = 'cache3';
const urlsToCache = [
    '/',
    '/logo.png',
    '/bootstrap.css',
    '/offline.html'
];

self.addEventListener('install', function(event) {
    event.waitUntil(
        caches.open(CACHE_NAME).then(function(cache) {
            return cache.addAll(urlsToCache);
        })
    );
});

self.addEventListener('fetch', function(event) {
    event.respondWith(
        caches.match(event.request).then(function(response) {
            return response || fetch(event.request).catch(function() {
                return caches.match('/offline.html');
            });
        })
    );
});
