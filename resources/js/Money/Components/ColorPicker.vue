<template>
    <div>
      <span v-for="(color, index) in colors">
        <button
            type="button"
            v-if="selected == index"
            v-on:click="setColor(index,color)"
            class="w-6 h-6 rounded-full mr-2 outline-none focus:outline-none ring-4 ring-gray-900"
            :class="color"
        >
        </button>
        <button
            type="button"
            v-else
            v-on:click="setColor(index,color)"
            class="w-6 h-6 rounded-full mr-2 outline-none focus:outline-none "
            :class="color"
        >
        </button>
      </span>

    </div>
</template>

<script>

    export default {
        components: {

        },

        data() {
            return {
                activeclass:'ring-2 ring-gray-900',
                selected:null,
                colors:['bg-gray-700','bg-green-300','bg-blue-300','bg-pink-400','bg-gray-400','bg-purple-700','bg-pink-700','bg-red-600','bg-green-700','bg-gray-700','bg-yellow-400','bg-red-900','bg-black'],
            }
        },

        methods: {
            setColor(index,color){
              this.selected = index
              this.$emit('getColor',color)
            },
        },
    }
</script>

<style>
    .active{

    }

</style>
