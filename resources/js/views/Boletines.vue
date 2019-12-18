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
                <b-pagination
                    :v-model="meta.current_page"
                    :total-rows="rows"
                    :per-page="meta.per_page"
                    aria-controls="tabla-boletines"
                ></b-pagination>
                <b-table
                    id="tabla-boletines"
                    :items="boletines"
                    :per_page="meta.per_page"
                    :current-page="meta.current_page"
                    :fields="['candidato', 'fecha', 'estado', 'encabezado']">
                </b-table>
            </div>
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
                ESTADO_API
            }
        },
        methods: {
            linkGen(pageNum) {
                return pageNum === 1 ? '?' : `?page=${pageNum}`
            },
            ...mapActions([
                'leerBoletines',
            ])
        },
        computed: {
            ...mapState({
                boletines: state => state.boletines.data,
                links: state => state.boletines.links,
                meta: state => state.boletines.meta,
                estadoApi: state => state.estadoApi,
            }),
            rows(){
                return this.boletines.length
            },
        },
        created() {
            this.leerBoletines();
        },
    }
</script>
