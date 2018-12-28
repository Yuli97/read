 <template>
    <div>
    <form action="" v-on:submit.prevent="">
        <div class="row">
            <div class="col-sm-2" >
                 <div v-for="cont_k in contacts_k">
                   <strong> <p v-if="cont_k.id_cont_k == contact.id_cont_k ">{{cont_k.description}}:</p></strong>
                 </div>

            </div>
            <div class="col-sm-9" style="padding-bottom:12px;">

                 <input v-if="editMode" type="text" class="form-control" v-model='contact.description'>
                <p v-else style="color: #3498db;background-color:  #f4f6f6;padding:8px;">{{contact.description}}</p>
                <button v-if="editMode" class="btn btn-success" v-on:click="onClickUpdate"> Save changes</button>
                <button v-else class="btn btn-warning" v-on:click="onClickEdit()">Edit</button>
                <button class="btn btn-danger" v-on:click="onClickDelete()">
                                Delete
                            </button>

            </div>

        </div>
    </form>
    </div>
 </template>
<script>
    export default {
        props:['contact','contacts_k'],
        data() {
            return {
                // verifica si el componente se esta editando o no
                editMode:false
            }
        },
        methods:{
            onClickEdit(){
                this.editMode=true
            },
            onClickUpdate(){
                const params = {
                    description: this.contact.description
                };
                axios.put('/api/contact/'+this.contact.id_cont,params).then((res)=>{
                    this.editMode=false;
                });
            },
            onClickDelete(){
                axios.delete('/api/contact/'+this.contact.id_cont).then(()=>{
                    this.$emit('refresh');
                });

            }
        }
    }
</script>
