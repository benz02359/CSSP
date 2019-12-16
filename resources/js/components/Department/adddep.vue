<template>
    <div>
        <div class="container">
            <h1>Add new</h1>
            <form action="/deps">
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control" v-model="name">
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
        }
    },
    methods:{
        addNewData(){
            //console.log(this.name);
            //console.log(this.city);
            axios.post('/api/deps',{
                name:this.name,
            });
        }
    }
}
</script>