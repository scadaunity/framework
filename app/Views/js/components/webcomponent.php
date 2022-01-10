<script type="text/javascript">

  const template = document.createElement('template')

  template.innerHTML = `
    <style>
        button{
          color:red;
        }
    </style>

    <button>
        <slot name="texto"></slot>
        <span id="contador">0</span>
    </button>
  `;

    class BtnLogin extends HTMLElement {
      constructor() {
        super();
        console.log('Fui criado')

        this.attachShadow({mode:'open'});

        this.shadowRoot.appendChild(template.content.cloneNode(true))
      }

      connectedCallback(){
        console.log('Callback')
        const button = this.shadowRoot.querySelector('button')
        const contador = this.shadowRoot.getElementById('contador')

        button.addEventListener('click',() => {
          contador.innerText = parseInt(contador.textContent) + 1
        })
      }
    }

    window.customElements.define('btn-login',BtnLogin);

</script>
