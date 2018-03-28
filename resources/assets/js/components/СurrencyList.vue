<template>
    <div class="container">
        <nav class="navbar navbar-light bg-light justify-content-between">
            <span class="navbar-brand" >Список валют</span>
            <button @click.prevent="setCurrencyList"
                    class="btn btn-outline-success my-2 my-sm-0"
            >
                Обновить
            </button>
        </nav>

        <table class="table">
            <thead >
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название валюты</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Количество</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for="(currency, idx) in getCurrencyList()" v-bind:key="idx">
                    <th scope="row">{{ idx + getFirstItemIndex() }}</th>
                    <td>{{ currency.name }}</td>
                    <td>{{ currency.volume }}</td>
                    <td>{{ currency.amount }}</td>
                </tr>
            </tbody>
        </table>

        <nav aria-label="Page navigation example">
            <ul class="pagination">

                <li v-for="(p, idx) in paginationList"
                    v-bind:key="idx"
                    class="page-item"
                    :class="{active: currentPage === (idx + 1)}"
                    @click.prevent="setPage(idx + 1)"
                >
                    <a class="page-link" href="#">{{idx + 1}}</a>
                </li>

            </ul>
        </nav>
    </div>
</template>

<script>
    export default {
        data ()  {
            return {
                currencyList: [],
                total: 0,
                pageSize: 50,
                currentPage: 1,
                paginationList: [],
                updateInterval: 15000
            }
        },
        methods: {
            setCurrencyList () {
                let vm = this;

                axios.get('/api/currency').then(function (response) {
                    vm.currencyList = response.data;
                    vm.total = _.size(vm.currencyList);
                    vm.setPaginationList()
                }).catch(function (error) {
                    console.log(error);
                });
            },
            updateCurrencyList(){
                let vm = this;
                    this.setCurrencyList();
                setTimeout(vm.updateCurrencyList, vm.updateInterval)
            },
            range(start, end, stepSize) {
                const length = Math.floor( (end - start) / stepSize ) + 1;
                return Array.apply(0, Array(length)).map( (curr, idx) => (start + (idx * stepSize)) );
            },
            setPaginationList() {
                this.paginationList = this.range(1, this.total, this.pageSize)
            },
            setPage(pageNum){
                this.currentPage = pageNum
            },
            getFirstItemIndex(){
                return this.paginationList[this.currentPage - 1]
            },
            getLastItemIndex(){
                return this.paginationList[this.currentPage] - 1 || this.total
            },
            getCurrencyList(){
                return _.slice(this.currencyList, this.getFirstItemIndex() - 1, this.getLastItemIndex());
            },
            time() {

            }
        },
        mounted (){
            this.updateCurrencyList()
        },
        computed: {

        }
    }
</script>