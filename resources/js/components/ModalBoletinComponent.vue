<template>
    <b-modal id="modal-boletin" size="lg" hide-footer>
        <template v-slot:modal-title>
            Boletin {{boletinActual ? boletinActual.id : ''}}
        </template>
        <div class="d-block text-center">
            <h3>{{boletinActual && boletinActual.encabezado ? boletinActual.encabezado : 'Encabezado'}}</h3>
        </div>
        <b-button class="mt-3" block @click="$bvModal.hide('modal-boletin')">Cerrar</b-button>
    </b-modal>
</template>
<script>
    import {mapGetters} from 'vuex';
    import ESTADO from '../enum-estado-api';
    export default {
        data() {
            return {
                ESTADO
            }
        },
        computed: {
            ...mapGetters([
                'boletinActual',
                'estadoBoletinActual'
            ]),
            mostrarModal(){
                return this.estadoBoletinActual == this.ESTADO.LISTO;
            }
        },
    }

</script>
