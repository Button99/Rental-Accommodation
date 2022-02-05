import AppStorage from "./AppStorage"
import User from "./User";

class Validate{

    // For this I need to implement a boolean function 
    deleteAccountVal(data) {
        console.log(data.first_name);
        if(data.first_name === User.getName()) {
            return true;
        }
        return false;
    }
}

export default Validate= new Validate();