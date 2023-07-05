<template>
    <div>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Order Number</th>
                            <th>Pizza size</th>
                            <th scope="col">Toppings</th>
                            <th scope="col">Price €</th>
                        </tr>
                    </thead>
                    <tbody v-for="order in orders">
                        <tr>
                            <th>{{ order.Id }}</th>
                            <td>{{ order.PizzaSize }}</td>
                            <td>{{ formatData(order.Toppings) }}</td>
                            <td>{{ order.PizzaPrice }}</td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <th style="border-bottom: none;"></th>
                            <td style="border-bottom: none;"></td>
                            <th style="border-bottom: none;float: right;">Total: </th>
                            <td style="float: middle">{{ total }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            orders: [],
            total: null
        }
    },
    mounted(){
        axios.get('/api/orders').then(res => {
            this.orders = res.data['orders']
            this.total = res.data['total']
        })
    },
    methods: {
        formatData(data){
            return data.length == 0 ? "Toppings weren't selected" : data.toString();
        }
    },
}
</script>