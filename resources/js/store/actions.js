import axios from 'axios'
import api from '../services/api'
import ESTADO_API from '../enum-estado-api'

export default {
    leerBoletines({commit, payload}){
        commit('colocarEstadoApi', ESTADO_API.CARGANDO)
        var uri = '';
        if(payload) uri = api.baseURL + 'boletines?page=' + payload;
        else uri = api.baseURL + 'boletines';
        axios
            .get(uri)
            .then(r => r.data)
            .then(boletines => {
                commit('colocarBoletines', boletines);
                commit('colocarEstadoApi', ESTADO_API.LISTO);
            })
            .catch(err=>{
                commit('colocarEstadoApi', ESTADO_API.ERROR);
            });
    }
};
