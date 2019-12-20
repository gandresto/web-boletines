<template>
<b-container fluid>
    <b-row class="pt-4">
        <b-col sm="12" md="3">
            <b-container>
                <div class="card-header">
                    Filtros
                </div>
                <div class="card-body">
                </div>
            </b-container>
        </b-col>
        <b-col sm="12" md="9">
            <template :v-if="estadoApi == ESTADO_API.LISTO">
                <paginador-component></paginador-component>
                <b-table striped hover
                    id="tabla-boletines"
                    :items="boletines"
                    :fields="['candidato', 'fecha', 'estado', 'encabezado']"
                    :busy="estaCargando"
                    head-variant="dark"
                    @row-clicked="verDetallesBoletin"
                >
                    <template v-slot:table-busy>
                        <div class="text-center text-primary my-2">
                        <b-spinner class="align-middle"></b-spinner>
                        <strong>Cargando...</strong>
                        </div>
                    </template>
                </b-table>
                <paginador-component></paginador-component>
            </template>
        </b-col>
    </b-row>
    <b-modal id="modal-boletin" hide-footer>
        <template v-slot:modal-title>
            {{boletinActual && boletinActual.encabezado ? boletinActual.encabezado : 'No encontrado'}}
        </template>
        <div class="d-block text-center">
            <h3>Hello From This Modal!</h3>
        </div>
        <b-button class="mt-3" block @click="$bvModal.hide('modal-boletin')">Cerrar</b-button>
    </b-modal>
</b-container>
</template>

<script>
    import { mapActions, mapGetters } from 'vuex'
    import ESTADO_API from '../enum-estado-api'

    export default {
        mounted() {
            console.log('Component Boletines Montado.');
            // this.leerBoletines();
        },
        data() {
            return {
                ESTADO_API,
            }
        },
        methods: {
            verDetallesBoletin({id}){
                console.log(id);
                this.leerBoletinActual(id);
                this.$bvModal.show('modal-boletin')
            },
            ...mapActions([
                'leerBoletines',
                'leerBoletinActual'
            ])
        },
        computed: {
            estaCargando(){
                return  this.estadoApi == ESTADO_API.CARGANDO;
            },
            ...mapGetters([
                'boletines',
                'estadoApi',
                'boletinActual',
            ]),
        },
        created() {
            this.leerBoletines();
        },
    }
</script>
<style>
    tbody tr {
        cursor: pointer;
    }
</style>
