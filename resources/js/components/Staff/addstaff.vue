<template>
    <div>
        <div class="container">
            <h1>Add new</h1>
            <form action="/staffs">
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control" v-model="name">
                </div>
                <div class="form-group">
                    <label>Telephone:</label>
                    <input type="text" class="form-control" v-model="tel">
                </div>
                <div class="form-group">
                    <label>Language:</label>
                    <input type="text" class="form-control" v-model="language">
                </div>
                <div class="form-group">
                    <label>Position:</label>
                    <input type="text" class="form-control" v-model="position">
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
            email:'@mail.com',
            language:'',
            position:'',
            image:0,
            dep_id:1,
            pro_id:1,
            user_id:10,
            tel:''
        }
    },
    methods:{
        addNewData(){
            //console.log(this.name);
            //console.log(this.city);
            axios.post('/api/staffs',{
                name:this.name,
                email:this.email,
                tel:this.tel,
                language:this.language,
                image:this.image,
                position:this.position,
                dep_id:this.dep_id,
                pro_id:this.pro_id,
                user_id:this.user_id
            });
        }
    }
}
</script>