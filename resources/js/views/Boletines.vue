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
            <div :v-if="estadoApi == ESTADO_API.LISTO">
                <paginador-component></paginador-component>
                <b-table
                    id="tabla-boletines"
                    :items="boletines"
                    :fields="['candidato', 'fecha', 'estado', 'encabezado']">
                </b-table>
            </div>
            <div :v-if="estadoApi== ESTADO_API.ERROR">ERROR</div>
            <div :v-if="estadoApi== ESTADO_API.CARGANDO">CARGANDO</div>
            <!-- <b-pagination-nav :link-gen="linkGen" :number-of-pages="meta.last_page"></b-pagination-nav> -->
        </div>
    </div>
</template>

<script>
    import { mapActions } from 'vuex'
    import { mapState } from 'vuex'
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
            ...mapState({
                boletines: state => state.boletines.data,
                estadoApi: state => state.estadoApi,
            }),
            created() {
                this.leerBoletines();
            },
        }
    }
</script>
