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
            <b-col cols="12" style="overflow-x:auto">
                <paginador-component></paginador-component>
            </b-col>
            <b-col cols="12" style="overflow-x:auto">
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
            </b-col>
            <b-col cols="12" style="overflow-x:auto">
                <paginador-component></paginador-component>
            </b-col>
        </b-col>
    </b-row>
</b-container>
</template>

<script>
    import { mapActions, mapGetters } from 'vuex'
    import ESTADO_API from '../enum-estado-api'
    import api from '../services/api'

    export default {
        mounted() {
            let uri = api.baseURL + 'boletines';
            this.leerBoletinesDeURI(uri);
        },
        data() {
            return {
                ESTADO_API,
            }
        },
        methods: {
            verDetallesBoletin({id}){
                this.leerBoletinActualPorId(id)
                    .then(() =>{
                        this.$bvModal.show('modal-boletin');
                    });
            },
            ...mapActions([
                'leerBoletines',
                'leerBoletinActualPorId',
                'leerBoletinesDeURI'
            ])
        },
        computed: {
            estaCargando(){
                return  this.estadoBoletines == ESTADO_API.CARGANDO;
            },
            ...mapGetters([
                'boletines',
                'estadoApi',
                'estadoBoletines',
            ]),
        },
        created() {
        },
    }
</script>
<style>
    tbody tr {
        cursor: pointer;
    }
</style>
