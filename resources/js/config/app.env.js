
const appConfig = {
    development_mode: true,
}

if(appConfig.development_mode) {
    appConfig.SERVER_URL = 'http://localhost:8080'
}

export default appConfig