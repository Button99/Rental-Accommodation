import { router } from "../app";
import AppStorage from "./AppStorage";

class Accommodation {


    createAccommodation(data) {
        axios({
            method: 'post',
            url: 'api/accommodation/create',
            headers: {
                Authorization: 'Bearer ' + JSON.parse(AppStorage.getToken()),
                'Content-Type': 'multipart/form-data'
            },
            data
        }).then((res) => {
            router.push({name: 'myAccommodations'});
        }).catch((err) => {
            alert(err);
        });
    }

    updateAccommodation(data, id) {
        axios({
            method: 'post',
            url: 'api/accommodations/' + id + '/update',
            headers: {
                Authorization: 'Bearer ' + JSON.parse(AppStorage.getToken()),
                'Content-Type': 'multipart/form-data'
            },
            data
            }).then((res) => {
                router.push({name: 'myAccommodations'});
            }).catch((err) => {
                 alert(err);
        });
    }

    deleteAccommodation(id) {
        axios.delete('api/accommodations/' + id + '/delete', {
            headers: {
                Authorization: 'Bearer ' + JSON.parse(AppStorage.getToken())
            }
        }).then((res) => {
            router.push({name: 'myAccommodations'});
        }).catch((err) => {
            alert(err);
        });
    }
}

export default Accommodation= new Accommodation();