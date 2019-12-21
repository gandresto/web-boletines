import ESTADO from '../enum-estado-api'

export default {
    estadoApi: ESTADO.INICIADO,
    estadoBoletines: ESTADO.INICIADO,
    estadoBoletinActual:  ESTADO.INICIADO,
    boletines : {
        data:[],
        meta:{
            current_page: null,
            from: null,
            last_page: null,
            path: null,
            per_page: null,
            to: null,
            total: null
        },
        links: {
            first: null,
            last: null,
            prev: null,
            next: null
        },
    },
    boletinActual: {
        id: null,
        candidato: null,
        num_boletin: null,
        fecha: null,
        localidad: null,
        estado: null,
        encabezado: null,
        primer_parrafo: null,
        url: null,
        sumarios: [
            {
                id: null,
                sumario: null,
            },
        ],
        categorias: [
            {
                id: null,
                categoria: null,
                explicacion: null,
            }
        ]
    },
    categorias : {
        persuasivas: [

        ],
        periodisticas: [

        ],
    },
};
