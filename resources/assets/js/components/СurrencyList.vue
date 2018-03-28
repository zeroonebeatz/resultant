<template>
    <div class="container">
        <nav class="navbar navbar-light bg-light justify-content-between">
            <span class="navbar-brand" >Список валют</span>
            <button class="btn btn-outline-success my-2 my-sm-0">Обновить</button>
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
                    <th scope="row">{{idx}}</th>
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
            setCurrencyList (list) {
                this.currencyList = list;
            }
        },
        mounted (){
            this.setCurrencyList([
                {
                    name: '2GO Group',
                    volume: 19600,
                    amount: 18.34
                },
                {
                    name: 'HOUSE PREF A',
                    volume: 23600,
                    amount: 23.31
                }
            ])
        }
    }
</script>