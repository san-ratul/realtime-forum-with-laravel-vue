import Token from "./Token";
import AppStorage from "./AppStorage";

class User {
    login(data) {
        axios.post('/api/auth/login', data)
            .then(res => this.responseAfterLogin(res))
            .catch(error => console.log(error.response.data))
    }

    responseAfterLogin(res) {
        const access_token = res.data.access_token;
        const user_name = res.data.user;
        if (Token.isValid(access_token)) {
            AppStorage.store(user_name, access_token);
            window.location = '/forum';
        }

    }

    hasToken() {
        const storedToken = AppStorage.getToken();
        if (storedToken) {
            return Token.isValid(storedToken) ? true : false;
        }

        return false;
    }

    loggedin() {
        return this.hasToken();
    }

    logout() {
        AppStorage.clear();
        window.location = '/forum';
    }

    name() {
        if (this.loggedin()) {
            return AppStorage.getUser();
        }
    }

    id() {
        if (this.loggedin()) {
            const payload = Token.payload(AppStorage.getToken());
            return payload.sub;
        }
    }

    own(id) {
        return this.id() == id ? true : false;
    }
}

export default User = new User();