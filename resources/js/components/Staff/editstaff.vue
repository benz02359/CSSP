<template>
    <div>
        <div class="container">
            <h1>Update</h1>
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
            language:'',
            position:'',
            dep_id:'',
            pro_id:'',
            user_id:'',
            image:'',
        }
    },mounted(){
        axios.get('/api/staffs/'+this.id).then(response=>{
            //console.log(response.data);
            //console.log(this.id);
            var data = response.data;
            this.name=data.name;
            this.email=data.email;
            this.tel=data.tel;
            this.language=data.language;
            this.position=data.position;
            this.image=data.image;
            this.dep_id=data.dep_id;
            this.pro_id=data.pro_id;
            this.user_id=data.user_id;
        });
    },
    methods:{
        updateData(){
            axios.put('/api/staffs/'+this.id,{
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