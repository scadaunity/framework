
if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
        console.log('Pagina carregada')
        navigator.serviceWorker.register('./sw.js').then(registration => {
        console.log('SW registered: ', registration);
        }).catch(registrationError => {
        console.log('SW registration failed: ', registrationError);
        });
    });
}




