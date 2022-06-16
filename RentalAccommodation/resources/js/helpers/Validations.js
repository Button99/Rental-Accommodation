import AppStorage from "./AppStorage"
import User from "./User";

class Validate{

    // For this I need to implement a boolean function 
    deleteAccountVal(data) {
        if(data.first_name === User.getName()) {
            return true;
        }
        return false;
    }

    changePasswordVal(data) {
        if(data.new_password === data.new_passwordRetype && data.new_password.length >=8) {
            return true;
        }
        return false;
    }

    loginVal(data) {
    
    }
}

export default Validate= new Validate();