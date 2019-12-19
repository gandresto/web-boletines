import axios from 'axios'
import api from '../services/api'
import ESTADO_API from '../enum-estado-api'

export default {
    leerBoletines({commit}){
        commit('colocarEstadoApi', ESTADO_API.CARGANDO);
        let uri = api.baseURL + 'boletines';
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
    },
    leerBoletinesDeURI({commit}, uri){
        commit('colocarEstadoApi', ESTADO_API.CARGANDO);
        axios
            .get(uri)
            .then(r => r.data)
            .then(boletines => {
                commit('colocarBoletines', boletines);
                commit('colocarEstadoApi', ESTADO_API.LISTO);
            })
            .catch(err=>{
                commit('colocarEstadoApi', ESTADO_API.ERROR);
                console.log(err);
            });
    },
    leerBoletinesPorPagina({commit}, pag){
        commit('colocarEstadoApi', ESTADO_API.CARGANDO);
        let uri = `${api.baseURL}boletines?page=${pag}`
        axios
            .get(uri)
            .then(r => r.data)
            .then(boletines => {
                commit('colocarBoletines', boletines);
                commit('colocarEstadoApi', ESTADO_API.LISTO);
            })
            .catch(err=>{
                commit('colocarEstadoApi', ESTADO_API.ERROR);
                console.log(err);
            });
    },
};
