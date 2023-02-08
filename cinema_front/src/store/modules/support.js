import axios from "axios";

export const support = {
    state: {},

    mutations: {},

    actions: {
        async sendContent(context, payload) {
            try {
                let response = await axios.post(process.env.VUE_APP_API_URL + 'api/support', payload)
                return response.data;
            } catch (error) {
                return error.response;
            }
        },
    },

    getters: {}

};
