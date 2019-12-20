<template>
    <b-modal id="modal-boletin"
            :title="titulo"
            header-bg-variant="dark"
            header-text-variant="light"
            size="lg"
            >
        <b-container>
            <h3>{{encabezado}}</h3>
            <hr>
            <ul>
                <li v-for="data in sumarios" :key="data.id">
                    {{data.sumario}}
                </li>
            </ul>
            <hr>
            <p>
                {{primerParrafo}}
            </p>
        </b-container>
        <!-- <b-button class="mt-3" block @click="$bvModal.hide('modal-boletin')">Cerrar</b-button> -->
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
            titulo(){
                return `Boletín ${this.boletinActual ? this.boletinActual.id : ''}`;
            },
            encabezado(){
                return this.boletinActual ? this.boletinActual.encabezado : 'Encabezado';
            },
            sumarios(){
                // return [];
                return this.boletinActual && this.boletinActual.sumarios ? this.boletinActual.sumarios : [];
            },
            primerParrafo(){
                return this.boletinActual && this.boletinActual.primer_parrafo ? this.boletinActual.primer_parrafo : '';
            }
        },
    }

</script>
