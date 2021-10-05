<template>
  <div class="flex flex-wrap">
    <div class="w-full">
      <ul class="flex mb-0 list-none flex-wrap flex-row">
        <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
          <a class="text-xs font-bold uppercase px-3 py-3 shadow-lg rounded block leading-normal" v-on:click="toggleTabs(1)" v-bind:class="{'text-pink-600 bg-white': openTab !== 1, 'text-white bg-green-600': openTab === 1}">
            Receita
          </a>
        </li>
        <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
          <a class="text-xs font-bold uppercase px-3 py-3 shadow-lg rounded block leading-normal" v-on:click="toggleTabs(2)" v-bind:class="{'text-pink-600 bg-white': openTab !== 2, 'text-white bg-red-600': openTab === 2}">
            Despesa
          </a>
        </li>
        <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
          <a class="text-xs font-bold uppercase px-3 py-3 shadow-lg rounded block leading-normal" v-on:click="toggleTabs(3)" v-bind:class="{'text-pink-600 bg-white': openTab !== 3, 'text-white bg-blue-600': openTab === 3}">
            Transferencia
          </a>
        </li>
      </ul>
      <div class="relative flex flex-col min-w-full break-words bg-white w-full mb-6 shadow-lg rounded" :class="color">
        <div class="px-4 py-5 flex-auto min-w-full">
          <div class="tab-content tab-space min-w-full">
            <div :class="{'hidden': openTab !== 1, 'block': openTab === 1}" class="min-w-full">
              <h1 class="min-w-full">
                R$ 000.00
              </h1>
            </div>
            <div :class="{'hidden': openTab !== 2, 'block': openTab === 2}">
              <p>
                Completely synergize resource taxing relationships via
                premier niche markets. Professionally cultivate one-to-one
                customer service with robust ideas.
                <br />
                <br />
                Dynamically innovate resource-leveling customer service for
                state of the art customer service.
              </p>
            </div>
            <div :class="{'hidden': openTab !== 3, 'block': openTab === 3}">
              <p>
                Efficiently unleash cross-media information without
                cross-media value. Quickly maximize timely deliverables for
                real-time schemas.
                <br />
                <br />
                Dramatically maintain clicks-and-mortar solutions
                without functional solutions.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "pink-tabs",
  data() {
    return {
      openTab: 1,
      color:'bg-green-600',
    }
  },
  methods: {
    toggleTabs: function(tabNumber){
      this.openTab = tabNumber
      if(tabNumber == 1){
        this.color = "bg-green-300"
      }
      if(tabNumber == 2){
        this.color = "bg-red-300"
      }
      if(tabNumber == 3){
        this.color = "bg-blue-300"
      }
    }
  }
}
</script>
