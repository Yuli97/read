 <template>
    <div class="form-group row">
        <label for="id_cont_k" class="col-sm-2 col-form-label">Contactos</label>

        <div class="col-sm-10">
             <!-- Evento 'new' que recibe del hijo 'form-thought-component' -->
                <setContact :company='company'
                :contacts_k='contacts_k'
                @new='addContact'
                @refresh='refresh(...arguments)'> <!--Metodo al cual se dirige-->
                </setContact>
                <viewContact
                v-for='(contact) in contacts'
                :key='contact.id_cont'
                :company='company'
                :contact='contact'
                :contacts_k='contacts_k'
                @refresh='refresh(...arguments)'
                >

                </viewContact>
                <p v-if="countNull" style="color:red">{{mess}}</p>
                <p v-else></p>
        </div>


    </div>
 </template>
<script>
    export default {
        props:['contacts_k','company'],
        data() {
            return {
                contacts:[],
                countNull:false,
                mess:''
            }

        },
         mounted() {
            console.log('Component mounted.')
            axios.get('/api/contact/'+this.company.id_comp).then((res)=>{
                this.contacts=res.data;
            });
        },
        methods:{
            addContact(contact) {
                this.countNull=false;
                console.log('ok-si');
                this.contacts.push(contact);
            },
            refresh(mess){
                if (mess != '') {
                        this.countNull=true;
                        this.mess=mess;
                        console.log(mess);
                    } else {
                        this.countNull=false;
                        this.mess='';
                        console.log('ok');
                }

                axios.get('/api/contact/'+this.company.id_comp).then((res)=>{
                this.contacts=res.data;
            });

            }

        }


    }
</script>
