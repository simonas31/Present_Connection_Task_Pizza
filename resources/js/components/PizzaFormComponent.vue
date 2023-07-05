<template>
    <div class="card">
        <div class="card-body">
            <form id="pizzaForm" @submit="submitForm">
                <div class="row justify-content-md-center">
                    <div v-if="checkOutput(output)" class="d-flex justify-content-center" style="color: green;">Pizza order was successful!</div>
                    <div class="col col-md-2">
                        <div class="form-group">
                            <label for="size">Select pizza size:</label>
                            <select class="form-select form-control-sm" name="size" id="size" v-model="size" :required="true">
                                <option value="Small">Small</option>
                                <option value="Medium">Medium</option>
                                <option value="Large">Large</option>
                            </select>
                        </div>
                    </div>
                    <div class="col col-md-2">
                        <div>
                            <label>Toppings</label>
                            <Multiselect v-model="toppings" :options="options" mode="multiple" :close-on-select="false" ref="multiselect"/>
                        </div>
                    </div>
                    <div class="col col-md-1">
                        <button class="btn btn-primary" type="submit">Order pizza</button>
                    </div>
                </div>
            </form>
            <br>
            <div v-if="checkOutput(output)">
                <div class="d-flex justify-content-center"><b>Ordered pizza</b></div>
                <div class="d-flex justify-content-center">Pizza size: {{ output[0]['size'] }}</div>
                <div class="d-flex justify-content-center">Toppings:&nbsp;
                    <p v-for="topping in output[0]['toppings']" style="all: unset;">{{ topping }},&nbsp;</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Multiselect from '@vueform/multiselect'
import axios from "axios"

export default {
    components: {
        Multiselect,
        axios
    },
    data() {
        return {
            size: null,
            toppings: null,
            options: [],
            output: null,
            toppingsData: null
        }
    },
    mounted(){
        axios.get('/api/toppings').then(res => {
            this.toppingsData = res.data;
            this.options = res.data.slice();
        })
    },
    methods: {
        submitForm(e) {
            e.preventDefault();
            let currentObj = this;
            axios.post('/api/', {
                size: this.size,
                toppings: this.toppings
            })
            .then(function (response) {
                currentObj.output = response.data;
            })
            .catch(function (error) {
                currentObj.output = error;
            });
            this.size = null
            this.$refs.multiselect.clear()
        },
        checkOutput(output) {
            return output != null && output[0]['size'] != null;
        },

    }
}
</script>

<style src="@vueform/multiselect/themes/default.css"></style>