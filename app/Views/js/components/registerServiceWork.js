
if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
        console.log('Pagina carregada')
        navigator.serviceWorker.register('./sw.js',{ scope: '/' }).then(registration => {
        console.log('SW registered: ', registration);
        }).catch(registrationError => {
        console.log('SW registration failed: ', registrationError);
        });
    });
}




