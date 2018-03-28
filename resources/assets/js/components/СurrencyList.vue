<template>
    <div class="container">
        <nav class="navbar navbar-light bg-light justify-content-between">
            <span class="navbar-brand" >Список валют</span>
            <button @click.prevent="updateCurrencyList"
                    class="btn btn-outline-success my-2 my-sm-0"
            >
                Обновить
            </button>
        </nav>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название валюты</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Количество</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for="(currency, idx) in currencyList">
                    <th scope="row">{{idx+1}}</th>
                    <td>{{ currency.name }}</td>
                    <td>{{ currency.volume }}</td>
                    <td>{{ currency.amount }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data ()  {
            return {
                currencyList: []
            }
        },
        methods: {
            setCurrencyList () {
                let vm = this;

                axios.get('/api/currency').then(function (response) {
                    vm.currencyList = response.data
                }).catch(function (error) {
                    console.log(error);
                });
            },
            updateCurrencyList(){
                this.setCurrencyList()
            }
        },
        mounted (){
            this.setCurrencyList()
        }
    }
</script>