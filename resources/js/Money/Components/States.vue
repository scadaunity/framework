<template>

  <div class="w-full lg:w-1/3">
      <div class="w-full p-4 rounded-lg bg-white border border-gray-200 shadow hover:bg-gray-100">
          <div class="flex flex-row items-center justify-between">

              <div class="flex flex-col">
                  <div class="text-xs uppercase font-light text-gray-500">
                      {{label}}
                  </div>
                  <div class="text-md font-bold flex items-center justify-start">
                      {{value}}
                  </div>
              </div>

          </div>
          <div>
                <p v-if="percent > 0" class="flex items-center justify-end text-green-500 text-md">
                    <span class="font-bold">{{percent}}% </span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                      <path class="heroicon-ui" d="M20 15a1 1 0 002 0V7a1 1 0 00-1-1h-8a1 1 0 000 2h5.59L13 13.59l-3.3-3.3a1 1 0 00-1.4 0l-6 6a1 1 0 001.4 1.42L9 12.4l3.3 3.3a1 1 0 001.4 0L20 9.4V15z"/>
                    </svg>
                </p>

                <p v-if="percent < 0" class="flex items-center justify-end text-red-500 text-md">
                    <span class="font-bold">{{percent}}% </span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                      <path class="heroicon-ui" d="M20 9a1 1 0 012 0v8a1 1 0 01-1 1h-8a1 1 0 010-2h5.59L13 10.41l-3.3 3.3a1 1 0 01-1.4 0l-6-6a1 1 0 011.4-1.42L9 11.6l3.3-3.3a1 1 0 011.4 0l6.3 6.3V9z"/>
                    </svg>
                </p>

                <p v-if="percent == 0" class="flex items-center justify-end text-gray-500 text-md">
                    <span class="font-bold">{{percent}}% </span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                      <path class="heroicon-ui" d="M17 11a1 1 0 010 2H7a1 1 0 010-2h10z"/>
                    </svg>
                </p>

            </div>
      </div>
  </div>
</template>

<script>
    export default {
        props: ['label','value','percent','svgPath'],

        components: {

        },

        data() {
            return {

            }
        },

        methods: {

        },
    }
</script>
