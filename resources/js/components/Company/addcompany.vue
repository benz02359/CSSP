<template>
    <div>
        <div class="container">
            <h1>Add new</h1>
            <form action="/companies">
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control" v-model="name">
                </div>
                <div class="form-group">
                    <label>E-mail:</label>
                    <input type="text" class="form-control" v-model="email">
                </div>
                <div class="form-group">
                    <label>Telephone:</label>
                    <input type="text" class="form-control" v-model="tel">
                </div>
                <div class="form-group">
                    <label>Address:</label>
                    <input type="text" class="form-control" v-model="address">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" v-on:click="addNewData()">Add</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            name:'',
            email:'',
            tel:'',
            address:'',
        }
    },
    methods:{
        addNewData(){
            //console.log(this.name);
            //console.log(this.city);
            axios.post('/api/companies',{
                name:this.name,
                email:this.email,
                tel:this.tel,
                address:this.address,
            });
        }
    }
}
</script>