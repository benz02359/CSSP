<template>
    <div>
        <div class="container">
            <span class="text-left" ></span>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-9 main-content thread-show">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h1 class="thread-title">{{title}}</h1>
                            <div class="text-xs-muted">
                                <i aria-hidden="true"></i>
                                Published  By 
                                <a href="#">
                                    {{user_id}}
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            {{text}} 
                        </div>
                        View {{view}} Program:{{pro_id}}
                    </div>

                
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-9 main-content thread-show">
                    <div class="card mb-3">
                        <div class="card-header">
                            <p class="thread-title">Comment</p>                            
                        </div>
                        <div class="card-body">
                            Name
                            {{text}} 
                        </div>
                        
                    </div>

                
                </div>
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
            this.getPostData();
            console.log("..");
        },
        methods:{
            getPostData(){
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
