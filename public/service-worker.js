// نام کش برای ذخیره منابع
const CACHE_NAME = 'pwa-cache-v1';

// منابعی که باید کش شوند
const urlsToCache = [
  '/',
  '../views/pages/index.php',
  '../public/ev-admin-dashboard-template.multipurposethemes.com/bs5/template/vertical/src/css/style.css',
  '../public/ev-admin-dashboard-template.multipurposethemes.com/bs5/template/vertical/src/css/skin_color.css',
  '../public/ev-admin-dashboard-template.multipurposethemes.com/bs5/template/vertical/src/css/custom.css',
  'icon-192x192.png',
  'icon-512x512.png'
];

// نصب service worker و کش کردن منابع
self.addEventListener('install', (event) => {
  console.log('[Service Worker] نصب');
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then((cache) => {
        console.log('[Service Worker] کش کردن همه منابع');
        return cache.addAll(urlsToCache);
      })
  );
});

self.addEventListener('activate', (event) => {
  console.log('[Service Worker] فعال شدن');
  const cacheWhitelist = [CACHE_NAME];
  event.waitUntil(
    caches.keys().then((cacheNames) => {
      return Promise.all(
        cacheNames.map((cacheName) => {
          if (!cacheWhitelist.includes(cacheName)) {
            console.log(`[Service Worker] حذف کش ${cacheName}`);
            return caches.delete(cacheName);
          }
        })
      );
    })
  );
});

self.addEventListener('fetch', (event) => {
  console.log(`[Service Worker] دریافت درخواست برای ${event.request.url}`);
  event.respondWith(
    caches.match(event.request).then((cachedResponse) => {
      if (cachedResponse) {
        console.log(`[Service Worker] یافتن پاسخ در کش برای ${event.request.url}`);
        return cachedResponse;
      }
      console.log(`[Service Worker] فراخوانی از شبکه برای ${event.request.url}`);
      return fetch(event.request);
    })
  );
});

self.addEventListener('push', (event) => {
  console.log('[Service Worker] دریافت اعلان');
  const options = {
    body: event.data.text(),
    icon: '/icons/icon-192x192.png',
    badge: '/icons/icon-192x192.png'
  };

  event.waitUntil(
    self.registration.showNotification('اعلان جدید', options)
  );
});
