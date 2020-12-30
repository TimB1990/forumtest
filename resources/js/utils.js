export function isLoggedIn() {
    return localStorage.getItem("isLoggedIn") == "true";
}

export function logIn() {
    localStorage.setItem("isLoggedIn", true);
}

export function setToken(token){
    localStorage.setItem("token", token)
}

export function getToken(){
    return localStorage.getItem("token");
}

export function clearStorage(){
    localStorage.clear()
}

