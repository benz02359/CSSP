<template>
    <div>
        <div class="container">
            <h1>Update</h1>
            <form action="/deps">
               <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control" v-model="name">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" v-on:click="updateData()">Update</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    props:['id'],
    data(){
        return{
            name:'',
        }
    },mounted(){
        axios.get('/api/deps/'+this.id).then(response=>{
            //console.log(response.data);
            //console.log(this.id);
            var data = response.data;
            this.name=data.name;
        });
    },
    methods:{
        updateData(){
            axios.put('/api/deps/'+this.id,{
                name:this.name,
            });
        }
    }
}
</script>