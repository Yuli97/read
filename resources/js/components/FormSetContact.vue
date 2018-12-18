<template>
<div class="card">
    <div class="card-header">Agregar Contacto</div>

        <div class="card-body">
        <form action="" v-on:submit.prevent=''>
                <div class="form-group">
                <label for="contacto">Contacto:</label>
                <input type="text" class="form-control" id="thought"
                placeholder="Ingrese contacto" name="contacto">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
         </form>
    </div>
 </div>
</template>
