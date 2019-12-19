import ESTADO_API from '../enum-estado-api'

export default {
    estadoApi: ESTADO_API.INICIADO,
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
    }
};
