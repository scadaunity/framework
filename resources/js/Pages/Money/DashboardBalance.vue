<template>
    <jet-action-section>
        <template #title>
            Visão geral
        </template>

        <template #description>
            Acompanhe o resumo de suas finanças.
            <br>
        </template>

        <template #content>
            <div class=" mb-6 flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
                <states v-if="show.balance" label="Saldo" :value="balance" percent="0"/>
                <states v-if="show.incoming" label="Receitas" :value="incoming" percent="0"/>
                <states v-if="show.expenses" label="Despesas" :value="expenses" percent="0"/>
                <states v-if="show.cards" label="Meus cartões" value="00.00" percent="0"/>
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
          this.balance = this.format(this.getBalance())
          this.incoming = this.format(this.getIncoming())
          this.expenses = this.format(this.getExpenses())
        },
        getOpeningBalance(){
          let openingBalance = null
          this.$page.props.money.account.forEach((account, i) => {
            openingBalance = openingBalance + parseFloat(account.opening_balance)
          });
          return openingBalance
        },

        getExpenses(){
          let expenses = null
          this.$page.props.money.transactions.forEach((transaction, i) => {
            if(transaction.type == 0){
              expenses = expenses + parseFloat(transaction.amount)
            }
          });
          return expenses
        },
        getIncoming(){
          let incoming = null
          this.$page.props.money.transactions.forEach((transaction, i) => {
            if(transaction.type == 1){
              incoming = incoming + parseFloat(transaction.amount)
            }
          });
          return incoming
        },
        getBalance(){
          return this.getOpeningBalance() + this.getIncoming() - this.getExpenses()
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
