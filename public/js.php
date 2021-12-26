<?php header("Content-type: application/javascript"); ?>


/**
 * Verifica se todo o documento foi carregado
 * @type {String}
 */
window.addEventListener('load', () =>{
  // Registra o service worker
  registerSW()
})

// METODO RESPONSAVEL POR REGISTRAR O SERVICE WORKER
async function registerSW(){
  if('serviceWorker' in navigator){
    try {
      await navigator.serviceWorker.register('./serviceWorker.js')
      console.log(
        '%cScadaUnity ' + '%cService Worker ' + '%cRegistrado com sucesso.', 'font-weight: bold;', 'color:white;background-color:GREEN;font-weight: bold; border-radius: 5px; padding: 2px 2px 2px 8px', 'font-weight: bold;padding-left:5px;',
      );
    } catch (e) {
      console.log(
        '%cScadaUnity ' + '%cService Worker ' + '%cFalha ao registrar o service worker.', 'font-weight: bold;', 'color:white;background-color:red;font-weight: bold; border-radius: 5px; padding: 2px 2px 2px 8px', 'font-weight: bold;padding-left:5px;',
      );
    }
  }
}
