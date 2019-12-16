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
                    <label>Title:</label>
                    
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
  //solutiondata:[],
    data(){
        return{
            //post_id:0,
            title:'',
            text:'',
            view:'',
            user_id:'',
            pro_id:''
        }
    },mounted(){
        axios.get('/api/posts/'+this.id).then(response=>{
            //console.log(response.data);
            var data = response.data;
            this.title=data.title;
            this.text=data.text;
            this.view=data.view;
            this.user_id=data.user_id;
            this.pro_id=data.pro_id
        });
    },
    methods:{
        updateData(){
            axios.put('/api/posts/'+this.id,{
                name:this.name,
                city:this.city
            });
        }
    }
}
</script>

<style lang="css">
</style>
