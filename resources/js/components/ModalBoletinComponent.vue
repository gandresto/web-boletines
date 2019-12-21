<template>
    <b-modal id="modal-boletin"
            :title="titulo"
            header-bg-variant="dark"
            header-text-variant="light"
            scrollable
            size="lg"
            >
        <b-container>
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
        </b-container>
        <template v-slot:modal-footer>
            <button type="button" class="btn btn-danger" @click="$bvModal.hide('modal-boletin')">Calcelar</button>
            <button type="button" class="btn btn-primary" @click="$bvModal.hide('modal-boletin')">Aceptar</button>
        </template>
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
            }
        },
    }

</script>
