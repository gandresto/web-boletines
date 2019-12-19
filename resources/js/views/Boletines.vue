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
                <b-table
                    id="tabla-boletines"
                    :items="boletines"
                    :fields="['candidato', 'fecha', 'estado', 'encabezado']">
                </b-table>
                <paginador-component></paginador-component>
            </template>
            <!-- <template :v-else-if="estadoApi == ESTADO_API.ERROR">ERROR {{estadoApi}}</template>
            <template :v-else-if="estadoApi == ESTADO_API.CARGANDO">CARGANDO {{estadoApi}}</template> -->
        </b-col>
    </b-row>
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
