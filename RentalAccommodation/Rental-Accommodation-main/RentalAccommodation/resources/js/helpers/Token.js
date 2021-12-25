import axios from "axios";

class Token {

    payload(token) {
        const payload= token.split('|')[1];
        return payload;
    }

    isValid(token) {
        const payload= this.payload(token);
    
        if(payload) {
            axios.get('/user')
        }
    } 
}

export default Token= new Token();