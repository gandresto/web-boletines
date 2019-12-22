<template>
<div>
    <div class="form-check"
        v-for="cat in $data._categorias"
        :key="cat.id">
        <input type="checkbox"
                class="form-check-input"
                :id="cat.id"
                :value="cat.id"
                v-model="$data._checkInicial[cat.id]"
        ><label class="form-check-label" :for="cat.id">
            {{cat.nombre}}
        </label>
    </div>
</div>
</template>
<script>
export default {
    props : ['categorias', 'categoriasBoletin', 'boletinId', 'checkInicial'],
    data() {
        return {
            _categorias : this.categorias,
            _categoriasBoletin : this.categoriasBoletin,
            _checkInicial : this.checkInicial,
            _boletinId : this.boletinId,
        }
    },
}
</script>
