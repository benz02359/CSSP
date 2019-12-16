<template>
    <div>
        <div class="container">
            <h1>Add new</h1>
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
            name:'',
            detail:'',
            maintainstatus:'',
            solddate:'',
            startdate:'',
            enddate:'',
            company_id:'',
        }
    },
    methods:{
        addNewData(){
            //console.log(this.name);
            //console.log(this.city);
            axios.post('/api/programs',{
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