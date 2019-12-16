<template>
    <div>
        <div class="container">
            <h1>Update</h1>
            <form action="/testvues">
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control" v-model="name">
                </div>
                <div class="form-group">
                    <label>City:</label>
                    <input type="text" class="form-control" v-model="city">
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
            city:''
        }
    },mounted(){
        axios.get('/api/testvues/'+this.id).then(response=>{
            //console.log(response.data);
            var data = response.data;
            this.name=data.name;
            this.city=data.city;
        });
    },
    methods:{
        updateData(){
            axios.put('/api/testvues/'+this.id,{
                name:this.name,
                city:this.city
            });
        }
    }
}
</script>