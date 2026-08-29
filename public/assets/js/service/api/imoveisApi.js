import api from './api.js';

//Busca Lista de Imoveis Imoveis
export async function getImoveis(query) {
    return api.get(`/api/imoveis/?${query}`)
}
