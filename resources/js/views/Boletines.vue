<template>
    <div class="row justify-content-start pt-md-4">
        <div class="col-sm-12 col-md-3">
            <div class="container">
                <div class="card-header">
                    Filtros
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-9">
            <template :v-if="estadoApi == ESTADO_API.LISTO">
                <paginador-component></paginador-component>
                <b-table
                    id="tabla-boletines"
                    :items="boletines"
                    :fields="['candidato', 'fecha', 'estado', 'encabezado']">
                </b-table>
                <paginador-component></paginador-component>
            </template>
            <!-- <template :v-else-if="estadoApi == ESTADO_API.ERROR">ERROR {{estadoApi}}</template>
            <template :v-else-if="estadoApi == ESTADO_API.CARGANDO">CARGANDO {{estadoApi}}</template> -->
        </div>
    </div>
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
            // linkGen(pageNum) {
            //     return pageNum === 1 ? '?' : `?page=${pageNum}`
            // },
            ...mapActions([
                'leerBoletines',
            ])
        },
        computed: {
            ...mapGetters([
                'boletines',
                'estadoApi',
            ]),
        },
        created() {
            this.leerBoletines();
        },
    }
</script>
