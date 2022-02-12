
/**
 * Define um nome ao cache
 * @type {String}
 */
const cacheName = "ScadaUnity"

/**
 * Define os arquivos que serão carregados ao cache
 * @type {Array}
 */
const precacheFiles = [

];

/** Instala o cache */
self.addEventListener("install", function (event) {
    event.waitUntil(
        caches.open(cacheName).then(function (cache) {
            return cache.addAll(precacheFiles);
            console.log("[PWA Builder] PWA Instalado com sucesso");
        })
    )
    return self.skipWaiting()
});

// Ativa o cache
self.addEventListener("activate", function (event) {
  self.clients.claim()
});

// Se alguma requisição falhar, ele procurará a solicitação no cache e a servirá primeiro
self.addEventListener("fetch", function (event) {
    console.log('Metodo: '+event.request.method)
    console.log('Metodo: '+event.request)

  if (event.request.method !== "GET") return;

  event.respondWith(
    fromCache(event.request).then(
      function (response) {
        // The response was found in the cache so we responde with it and update the entry

        // This is where we call the server to get the newest version of the
        // file to use the next time we show view
        event.waitUntil(
          fetch(event.request).then(function (response) {
            return updateCache(event.request, response);
          })
        );

        return response;
      },
      function () {
        // The response was not found in the cache so we look for it on the server
        return fetch(event.request)
          .then(function (response) {
            // If request was success, add or update it in the cache
            event.waitUntil(updateCache(event.request, response.clone()));

            return response;
          })
          .catch(function (error) {
            console.log("[PWA Builder] Network request failed and no cache." + error);
          });
      }
    )
  );
});

function fromCache(request) {
  // Check to see if you have it in the cache
  // Return response
  // If not in the cache, then return
  return caches.open(cacheName).then(function (cache) {
    return cache.match(request).then(function (matching) {
      if (!matching || matching.status === 404) {
        return Promise.reject("no-match");
      }

      return matching;
    });
  });
}

function updateCache(request, response) {
  return caches.open(cacheName).then(function (cache) {
    return cache.put(request, response);
  });
}
