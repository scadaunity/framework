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
      await navigator.serviceWorker.register('./sw.js')
    } catch (e) {
      console.log("Falha ao registrar o service Worker")
    }
  }
}
