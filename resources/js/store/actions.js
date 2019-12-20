import axios from 'axios'
import api from '../services/api'
import ESTADO_API from '../enum-estado-api'

export default {
    leerBoletinesDeURI({commit}, uri){
        return new Promise((res, rej) => {
        commit('colocarEstadoApi', ESTADO_API.CARGANDO);
        commit('colocarEstadoBoletines', ESTADO_API.CARGANDO);
        axios
            .get(uri)
            .then(r => r.data)
            .then(boletines => {
                commit('colocarBoletines', boletines);
                commit('colocarEstadoApi', ESTADO_API.LISTO);
                commit('colocarEstadoBoletines', ESTADO_API.LISTO);
                res();
            })
            .catch(err=>{
                commit('colocarEstadoApi', ESTADO_API.ERROR);
                commit('colocarEstadoBoletines', ESTADO_API.ERROR);
                console.log(err);
                rej();
            });
        });
    },
    leerBoletinActualPorId({commit}, id){
        return new Promise((res, rej) => {
            commit('colocarEstadoApi', ESTADO_API.CARGANDO);
            commit('colocarEstadoBoletinActual', ESTADO_API.CARGANDO);
            let uri = `${api.baseURL}boletines/${id}`;
            axios
            .get(uri)
            .then(r => r.data)
            .then(boletin => {
                commit('colocarBoletinActual', boletin);
                commit('colocarEstadoApi', ESTADO_API.LISTO);
                commit('colocarEstadoBoletinActual', ESTADO_API.LISTO);
                res();
            })
            .catch(err=>{
                commit('colocarEstadoApi', ESTADO_API.ERROR);
                commit('colocarEstadoBoletinActual', ESTADO_API.ERROR);
                console.log(err);
                rej();
            });
        })
    }
};
