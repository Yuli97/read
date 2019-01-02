 <template>
 <div >
    <form action="" v-on:submit.prevent='newContact()'>
    <div class="row">
        <div class="col-sm-2">
            <select required class="form-control" id="id_cont_k" name="id_cont_k" >
            <option value="">--Seleccionar--</option>
            <option v-for="cont_k in contacts_k" v-on:click="setId(cont_k)">{{cont_k.description}} </option>
            </select>


        </div>

        <div class="col-sm-8">
            <input v-if="inputEmail" v-model="description" maxlength="150" type="email" style="width: 100%;border-color:  #3498db ;" class="form-control" placeholder="Escribir nuevo contacto" id="contact_desc" name="contact_desc">
            <input v-else v-model="description"  type="text" maxlength="10" style="width: 100%;border-color:  #3498db ;" class="form-control" placeholder="Escribir nuevo contacto" id="contact_desc" name="contact_desc">

        </div>
        <div class="col-sm-2">
              <button type="submit" class="btn btn-primary" value="Agregar">Agregar</button>
        </div>
    </div>

    </form>
    <hr>
    <!-- <H3 style="background-color: #e8ebec;color:#34495e;text-align:center;padding:4px;">CONTACTOS</H3> -->
 </div>


 </template>
<script>
    export default {
         props:['company','contacts_k'],
         data(){
            return{
                description:'',
                id_cont_k:null,
                inputEmail:false
            }
        },
         methods: {
            newContact(){
                console.log('here');
                const params = {
                    id_comp:this.company.id_comp,
                    id_cont_k:this.id_cont_k,
                    description: this.description
                };
                console.log('id: '+params.id_cont_k);
                this.description='';
                //Registrar a db


                if (this.inputEmail){
                  /*  axios.post('/api/contact',params)
                             .then((response)=> {
                                 const contact=response.data;
                                 console.log('aqui:', contact.description);
                                 this.$emit('new', contact);// Generar evento 'new' q recibe en 'TheThought'
                             }); */
                   if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(params.description)){
                          axios.post('/api/contact',params)
                             .then((response)=> {
                                 const contact=response.data;
                                 console.log('aqui:', contact.description);
                                 this.$emit('new', contact);// Generar evento 'new' q recibe en 'TheThought'
                             });
                            } else {
                                this.$emit('refresh','La dirección de email es incorrecta.');
                            }

                }else if(!this.inputEmail){
                    if(/^\D*\d{7,10}$/.test(params.description)){
                      axios.post('/api/contact',params)
                        .then((response)=> {
                            const contact=response.data;
                            console.log('aqui:', contact.description);
                            this.$emit('new', contact);// Generar evento 'new' q recibe en 'TheThought'
                        });
                    }else{
                            this.$emit('refresh','El contacto debe tener entre 7 y 10 dígitos');
                    }
                }


            },
            setId(cont_k){
                this.id_cont_k=cont_k.id_cont_k;
                if(cont_k.description == 'email'){
                this.inputEmail=true;}
                else{
                    this.inputEmail=false;
                }
            }
        }


    }
</script>
