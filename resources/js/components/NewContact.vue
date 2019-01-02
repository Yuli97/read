 <template>
 <div >

    <div class="row">
        <div class="col-sm-2">
            <select required class="form-control" id="id_cont_k" name="id_cont_k" >
            <option value="">--Seleccionar--</option>
            <option v-for="cont_k in contacts_k" v-on:click="setId(cont_k)" value="1">{{cont_k.description}} </option>
            </select>


        </div>

        <div class="col-sm-8">
            <input v-if="inputEmail" v-model="description" maxlength="150" type="email" style="width: 100%;border-color:  #3498db ;" class="form-control" placeholder="Escribir nuevo contacto" id="description" name="description">
            <input v-else v-model="description"  type="text" maxlength="10" style="width: 100%;border-color:  #3498db ;" class="form-control" placeholder="Escribir nuevo contacto" id="description" name="description">

        </div>
    </div>


    <hr>

 </div>


 </template>
<script>
    export default {
         props:['contacts_k'],
         data(){
            return{
                description:'',
                inputEmail:false
            }
        },
         methods: {
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
