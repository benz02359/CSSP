<template>
    <div>
        <div class="container">
            <h1>New Post</h1>
            <form action="/solutions">
                <div class="form-group">
                    <label>Title:</label>
                    <input type="text" class="form-control" v-model="title">
                </div>
                <div class="form-group">
                    <label>Detail:</label>
                    <input type="text" class="form-control" v-model="text">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" v-on:click="addNewData()">Add:</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            user_id:1,
            title:'',
            text:'',            
            pro_id:1,
            status:0
        }
    },
    methods:{
        addNewData(){
            /*console.log(this.title);
            console.log(this.text);
            console.log(this.user_id);
            console.log(this.pro_id);*/
            //console.log(this.city);
            axios.post('/api/solutions',{
                user_id:this.user_id,
                title:this.title,
                text:this.text,               
                pro_id:this.pro_id,
                status:this.status
            });
        }
    }
}
</script>