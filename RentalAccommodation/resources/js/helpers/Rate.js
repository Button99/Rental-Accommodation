import axios from 'axios';
import AppStorage from './AppStorage';


class Rate {
    rate(id, value) {
        axios({
            method: 'post',
            url: 'api/accommodations/' + id + '/rate',
            headers: {
                Authorization: 'Bearer ' + JSON.parse(AppStorage.getToken())
            },
            data: {rate: value}
            }).then((res) => {
                alert('works');
            }).catch((err) => {
                alert(err);
        });
    }
}

export default Rate= new Rate();