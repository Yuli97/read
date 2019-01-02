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
                <div class="row">
                    <div class="col-sm-10" >
                        <input required v-if="editMode && contact.id_cont_k == '3'" type="email" class="form-control"
                        v-model='contact.description' >
                        <input v-else-if="editMode && contact.description != 'email'" maxlength="10" type="text" class="form-control" v-model='contact.description'>
                        <p v-else style="color: #3498db;background-color:  #f4f6f6;padding:8px;">{{contact.description}}</p>

                    </div>
                    <div class="col-sm-1" >
                        <table>
                            <tr>
                                <td>
                                    <button type="submit" title="Save" v-if="editMode" class="btn btn-primary" v-on:click="onClickUpdate()"><span class="fa fa-check"></span></button>
                                    <button title="Editar" v-else v-on:click="onClickEdit()" class="btn btn-success btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>





                                </td>
                                <td>
                                    <button v-on:click="onClickDelete()" title="Eliminar" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i> </button>
                                </td>
                            </tr>

                        </table>

                    </div>

                </div>



            </div>

        </div>
    </form>
    </div>
 </template>
<script>
    export default {
        props:['contact','contacts_k','company'],
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

                if (this.contact.id_cont_k == '3'){
                  if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(this.contact.description)){
                        axios.put('/api/contact/'+this.contact.id_cont,params).then((res)=>{
                             this.editMode=false;
                        });

                    } else {
                        this.$emit('refresh','La dirección de email es incorrecta.');
                    }
                }else if(this.contact.id_cont_k == '1' || this.contact.id_cont_k == '2'){
                    if(/^\D*\d{7,10}$/.test(this.contact.description)){
                     axios.put('/api/contact/'+this.contact.id_cont,params).then((res)=>{
                             this.editMode=false;
                             this.$emit('refresh','');
                        });
                    }else{
                            this.$emit('refresh','El contacto debe tener entre 7 y 10 dígitos');
                    }
                }

            },
            onClickDelete(){
                axios.delete('/api/contact/delete/'+this.contact.id_cont+'/'+this.company.id_comp).then((response)=>{
                    const mess=response.data;
                    this.$emit('refresh',mess);
                });

            }
        }
    }
</script>
