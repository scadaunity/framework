<?php header("Content-type: application/javascript"); ?>

window.addEventListener('load', () =>{
  registerSW()
})

async function registerSW(){
  if('serviceWorker' in navigator){
    try {
      await navigator.serviceWorker.register('./pwabuilder-sw.js')
    } catch (e) {
      console.log("SW Registration failed")
    } finally {

    }
  }
}
