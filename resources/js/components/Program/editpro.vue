<template>
    <div>
        <div class="container">
            <h1>Update</h1>
            <form action="/programs">
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" class="form-control" v-model="name">
                </div>
                <div class="form-group">
                    <label>Detail:</label>
                    <input type="text" class="form-control" v-model="detail">
                </div>
                <div class="form-group">
                    <label>Maintain:</label>
                    <input type="text" class="form-control" v-model="maintainstatus">
                </div>
                <div class="form-group">
                    <label>Sold:</label>
                    <input type="date" class="form-control" v-model="solddate">
                </div>
                <div class="form-group">
                    <label>Start:</label>
                    <input type="date" class="form-control" v-model="startdate">
                </div>
                <div class="form-group">
                    <label>End:</label>
                    <input type="date" class="form-control" v-model="enddate">
                </div>
                <div class="form-group">
                    <label>Company:</label>
                    <input type="text" class="form-control" v-model="company_id">
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
            detail:'',
            maintainstatus:'',
            solddate:'',
            startdate:'',
            enddate:'',
            company_id:'',
        }
    },mounted(){
        axios.get('/api/programs/'+this.id).then(response=>{
            console.log(response.data);
            var data = response.data;
            this.name=data.name;
            this.detail=data.detail;
            this.maintainstatus=data.maintainstatus;
            this.solddate=data.solddate;
            this.startdate=data.startdate;
            this.enddate=data.enddate;
            this.company_id=data.company_id;
        });
    },
    methods:{
        updateData(){
            axios.put('/api/programs/'+this.id,{
                name:this.name,
                detail:this.detail,
                maintainstatus:this.maintainstatus,
                solddate:this.solddate,
                startdate:this.startdate,
                enddate:this.enddate,
                company_id:this.company_id,
            });
        }
    }
}
</script>