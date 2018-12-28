 <template>
    <div class="form-group row">
        <label for="id_cont_k" class="col-sm-2 col-form-label">Contactos</label>

        <div class="col-sm-10">
             <!-- Evento 'new' que recibe del hijo 'form-thought-component' -->
                <setContact :company='company'
                :contacts_k='contacts_k'
                @new='addContact'> <!--Metodo al cual se dirige-->
                </setContact>
                <viewContact
                v-for='(contact) in contacts'
                :key='contact.id_cont'
                :contact='contact'
                :contacts_k='contacts_k'
                @refresh='refresh()'
                >

                </viewContact>
        </div>


    </div>
 </template>
<script>
    export default {
        props:['contacts_k','company'],
        data() {
            return {
                contacts:[]
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
                this.contacts.push(contact);
            },
            refresh(){
                axios.get('/api/contact/'+this.company.id_comp).then((res)=>{
                this.contacts=res.data;
            });
            }
        }


    }
</script>
