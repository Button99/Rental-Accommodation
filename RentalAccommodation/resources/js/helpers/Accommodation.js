import { router } from "../app";
import AppStorage from "./AppStorage";

class Accommodation {


    createAccommodation(data) {
        axios({
            method: 'post',
            url: 'api/accommodation/create',
            headers: {
                Authorization: 'Bearer ' + JSON.parse(AppStorage.getToken())
            },
            data
        }).then((res) => {
            console.log('Accommodation created!');
            router.push({name: 'myAccommodations'});
        }).catch((err) => {
            alert(err);
        });
    }
}

export default Accommodation= new Accommodation();