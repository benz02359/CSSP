<template>
    <div>
        <div class="container">
            <span class="text-left" ></span>
                <div class="form-group">
                    <label></label>
                    
                </div>
                <div class="form-group">
                    <label></label>
                <div class="form-group">
                    <label>Title:{{title}}</label><br>
                    <label>Text:{{text}}</label><br>
                    <label>View:{{view}}</label><br>
                    <label>User:{{user_id}}</label><br>
                    <label>Program:{{pro_id}}</label><br>


                    
                </div>    
                    
                </div>
                <div class="form-group">
                    
                </div>     
        </div>
    </div>

</template>

<script>
export default {
    props:['id'], 
    data(){
        return{
            //post_id:0,
            title:'',
            text:'',
            view:'',
            user_id:'',
            pro_id:'',
            status:''
        }
    },
        mounted(){
            this.getSolutionData();
            console.log("..");
        },
        methods:{
            getSolutionData(){
                console.log("ช้อมูล")
                axios.get('/api/solutions/'+this.id).then(response=>{
                       console.log(response);
                    var data=response.data;
                    this.title=data.title;
                    this.text=data.text;
                    this.view=data.view;
                    this.user_id=data.user_id;
                    this.pro_id=data.pro_id;
                    this.status=data.status;
                });
            }      
        },
    }
</script>

<style lang="css">
</style>
