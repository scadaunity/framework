const url = 'http://localhost:5000/';
const app = document.getElementById('app');



  /**
   * Metodo responsavel por carregar a view
   */
  function view(page){
    axios.get(url + page)
      .then(function (response) {
        // manipula o sucesso da requisição
        console.log(response.data);

        clear()
        render(response.data);
      })
      .catch(function (error) {
        // manipula erros da requisição
        console.error(error);
      })
      .then(function () {
        // sempre será executado
      });
  }

  /**
   * Metodo responsavel por limpar a tela
   */
  function clear(){
    app.innerHTML ="";
  }

  /**
   * Metodo responsavel por renderizar a view
   */
  function render(page){
    app.innerHTML = page;
  }
