<template>
    <div>
        <div class="container">
            <h1>Update</h1>
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
            email:'',
            tel:'',
            address:'',
        }
    },mounted(){
        axios.get('/api/companies/'+this.id).then(response=>{
            //console.log(response.data);
            //console.log(this.id);
            var data = response.data;
            this.name=data.name;
            this.email=data.email;
            this.tel=data.tel;
            this.address=data.address;
        });
    },
    methods:{
        updateData(){
            axios.put('/api/companies/'+this.id,{
                name:this.name,
                email:this.email,
                tel:this.tel,
                address:this.address,
            });
        }
    }
}
</script>