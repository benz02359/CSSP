<template>
    <div>
        <div class="container">
            <h1>ตั้งกระทู้ใหม่</h1>
            <form action="/forums">
                <div class="form-group">
                    <label>ระบุหัวข้อ:</label>
                    <input type="text" class="form-control" v-model="title">
                </div>
                <div class="form-group">
                    <label>รายละเอียด:</label>
                    <textarea
                    
                    v-model="text"
                    class="form-control"
                    rows="15"
                    max-rows="30"
                    ></textarea>
                </div>
                
                <div class="form-group">
                    <button class="btn btn-primary" v-on:click="addNewData()" type="submit" value="Submit">ส่งกระทู้</button>
                    
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
            status:0,
            view:0
        }
    },
    methods:{
        addNewData(){
            /*console.log(this.title);
            console.log(this.text);
            console.log(this.user_id);
            console.log(this.pro_id);*/
            //console.log(this.city); 
            axios.post('/api/posts',{
                user_id:this.user_id,
                title:this.title,
                text:this.text,               
                pro_id:this.pro_id,
                status:this.status,
                view:this.view
                
            });
            
        }
    }
}
</script>