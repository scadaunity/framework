<template>
    <jet-action-section>
        <template #title>
            Despesas por Categoria
        </template>

        <template #description>
            Resumo das sua despesas por categorias, é possivel analizar pra onde vai seu dinheiro.
        </template>

        <template #content>
          <chart-pie :options="options" :series="series"/>
        </template>

    </jet-action-section>
</template>

<script>
  import JetActionSection from '@/Jetstream/ActionSection'
  import ChartPie from '@/Money/Components/ChartPie'

  export default {
      components: {
          JetActionSection,
          ChartPie
      },

      data: function() {
        return {
          series: [],
          options: {
            labels: [],
            chart: {
              type: 'pie', //pie or donut
            },
          },

        }
      },
      methods:{
          /**
           * Arrange expenses by category and subcategories amount.
           *
          */
          populateChart(){
            let label = null
            let series = null
              // itera as categorias
              this.$page.props.money.category.forEach((category, i) => {
                if(category.subcategories.length > 0){
                  category.subcategories.forEach((subcategory, i) => {
                    if(subcategory.transactions.length > 0){
                        series = series + this.sumExpenses(subcategory.transactions)
                    }
                  });
                }
                series = series + this.sumExpenses(category.transactions)
                label = category.name
                this.addData(label, series)
                series = null
                label = null
              })
          },

          /**
           * Sum transactions where type 0 - expenses.
           *
           * @param array transactions
           *
           * @return int sum
          */
          sumExpenses(transactions){
            let sum = 0
            transactions.forEach((transaction, i) => {
              if(transaction.type == 0){
                sum = sum + parseFloat(transaction.amount)
              }

            })
            return sum
          },

          /**
           * Add data to create chart.
           *
           * @param array label
           * @param array series
          */
          addData(label,series){
            if(series > 0){
              let tempSeries = series.toFixed(2)
              let floatSeries = parseFloat(tempSeries)
              this.options.labels.push(label + this.format(series))
              this.series.push(floatSeries)
            }
          },
          format(value){
            if(value > 0){
              return ' R$ ' + value.toFixed(2).replace(".", ",")
            } else {
              return 'R$ 00,00'
            }

          }
      },
      beforeMount(){
        this.populateChart()
      },
    }
</script>
