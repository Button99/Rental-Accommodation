import axios from 'axios';
import {router} from '../app';
import AppStorage from './AppStorage';


class Rate {
    addRate(id, value) {
        axios({
            method: 'post',
            url: 'api/accommodations/' + id + '/rate',
            headers: {
                Authorization: 'Bearer ' + JSON.parse(AppStorage.getToken())
            },
            data: {rate: value}
            }).then(() => {
                router.go();
            }).catch((err) => {
                alert(err);
        });
    }

}

export default Rate= new Rate();