<template>
    <b-modal id="modal-boletin"
            :title="titulo"
            header-bg-variant="dark"
            header-text-variant="light"
            scrollable
            size="lg"
            >
        <b-container>
            <b-row>
                <b-col cols=12>
                    <div class="text-right">
                        <p>{{fecha}}</p>
                    </div>
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
                </b-col>
            </b-row>
            <hr>
            <h4>Categorias</h4>
            <div class="form-row" v-for="(tipo_cat, index) in categorias" :key="index">
                <div class="col-xl-12">
                    <h5>{{index}}</h5>
                </div>
                <div class="form-group col-xl-12">
                    <categorias-checkbox-component
                        v-if="boletinActual && checkInicial"
                        :categorias="tipo_cat"
                        :categoriasBoletin="categoriasBoletin"
                        :checkInicial="checkInicial[index]"
                        :boletinId="boletinActual.id"
                    ></categorias-checkbox-component>
                </div>
            </div>
        </b-container>
        <template v-slot:modal-footer>
            <button type="button" class="btn btn-danger" @click="$bvModal.hide('modal-boletin')">Cancelar</button>
            <button type="button" class="btn btn-primary" @click="$bvModal.hide('modal-boletin')">Aceptar</button>
        </template>
        <!-- <b-button class="mt-3" block @click="$bvModal.hide('modal-boletin')">Cerrar</b-button> -->
    </b-modal>
</template>
<script>
    import {mapGetters} from 'vuex';
    import ESTADO from '../enum-estado-api';
    // import CategoriasCheckbox from './CategoriasCheckboxComponent.vue';

    export default {
        data() {
            return {
                ESTADO
            }
        },
        methods: {
            datosCategoria(cat_id){
                if (this.categoriasBoletin && this.categoriasBoletin.length > 0){
                    return [
                        this.categoriasBoletin.find(catBoletin => catBoletin.id == cat_id),
                        this.categoriasBoletin.map(cat => cat.id)
                    ];
                }
                else
                    return null;
            }
        },
        computed: {
            ...mapGetters([
                'boletinActual',
                'estadoBoletinActual',
                'categorias',
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
            },
            fecha(){
                if (this.boletinActual && this.boletinActual.fecha){
                    // Le agrego 12 horas para compensar el horario de México (GMT-6)
                    let strDate = [...this.boletinActual.fecha.split('-'), '12'];
                    let numDate = strDate.map( e => parseInt(e, 10));
                    // El conteo de meses inicia en 0, así que le resto 1 a el campo mes
                    numDate[1]-=1;
                    let d = new Date(Date.UTC(...numDate));
                    return d.toLocaleDateString('es', {dateStyle: "long"});
                }else
                    return '';
            },
            categoriasBoletin(){
                return this.boletinActual && this.boletinActual.categorias ? this.boletinActual.categorias : [];
            },
            computedCategorias(){
                return this.categorias && this.categorias.persuasivas ? this.categorias : [];
            },
            checkInicial(){
                if (this.computedCategorias && this.categoriasBoletin){
                    let checkInicial = {
                        persuasivas: {},
                        periodisticas: {},
                    };
                    for (let tipo_cat of ['persuasivas', 'periodisticas']){
                        let categorias =  this.computedCategorias[tipo_cat];
                        let subCheck = {};
                        categorias.forEach(cat =>
                            subCheck[cat.id] = this.categoriasBoletin.filter(cat_boletin =>
                                cat_boletin.id == cat.id).length>0
                        );
                        checkInicial[tipo_cat] = subCheck;
                    }
                    return checkInicial;
                } else return {};
            },
        },
    }

</script>
