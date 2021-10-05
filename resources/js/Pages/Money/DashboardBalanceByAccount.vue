<template>
    <jet-action-section>
        <template #title>
            Meus saldos
        </template>

        <template #description>
            Acompanhe o saldo das suas contas.
            <br>
        </template>

        <template #content>
            <div class="col-span-6 sm:col-span-4 space-y-2">
                <div v-for="account in accounts" :key="account.id">
                  <div class="flex items-center justify-between border-b border-dotted">
                    <span class="flex items-center py-1">
                        <div class="w-4 h-4 sm:w-8 sm:h-8 rounded-full bg-gray-200"></div>
                        <span class="text-xs sm:text-sm ml-3 block truncate">{{account.name}}</span>
                    </span>

                    <div class="flex items-center">
                        <!-- Category balance -->
                        <div class="text-xs sm:text-sm text-gray-400">{{account.value}}</div>

                    </div>
                  </div>

                </div>
            </div>
        </template>
    </jet-action-section>
</template>

<script>
    import JetActionSection from '@/Jetstream/ActionSection'
    import States from '@/Money/Components/States'

    export default {
      components: {JetActionSection,States},
      data: function() {
        return {
          accounts:[

          ],
          balance:null,
          incoming:null,
          expenses:null,
          cards:null,
          show:{
            balance:true,
            incoming:true,
            expenses:true,
            cards:false
          }
        }
      },
      methods:{
        render(){

          this.$page.props.money.account.forEach((account, i) => {
              let openingBalance = parseFloat(account.opening_balance)
              let expenses = this.getExpenses(account.id)
              let incoming = this.getIncoming(account.id)
              let value = openingBalance + incoming - expenses
              this.accounts.push({
                'id': account.id,
                'name':account.name,
                'value':this.format(value)
              })
          });
        },

        getExpenses(accountId){
          let expenses = null
          this.$page.props.money.transactions.forEach((transaction, i) => {
            if(transaction.account == accountId ){
                if(transaction.type == 0){
                  expenses = expenses + parseFloat(transaction.amount)
                }
            }

          });
          return expenses
        },
        getIncoming(accountId){
          let incoming = null
          this.$page.props.money.transactions.forEach((transaction, i) => {
            if(transaction.account == accountId ){
              if(transaction.type == 1){
                incoming = incoming + parseFloat(transaction.amount)
              }
            }

          });
          return incoming
        },

        format(value){
          if(value > 0){
            return 'R$ ' + value.toFixed(2).replace(".", ",")
          } else {
            return 'R$ 00,00'
          }

        }

      },
      beforeMount(){
        this.render()
      },
    }
</script>
